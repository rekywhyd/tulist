<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Subtask;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($request->has('date')) {
            $tasks = $user->tasks()->with('subtasks')->where('due_date', $request->date)->get();
            return response()->json($tasks);
        }

        $tasks = $user->tasks()->with('subtasks')->get();

        $todayTasks = $tasks->filter(function($task) {
            return $task->due_date->isToday() && !$task->completed;
        });
        $tomorrowTasks = $tasks->filter(function($task) {
            return $task->due_date->isTomorrow() && !$task->completed;
        });
        $upcomingTasks = $tasks->filter(function($task) {
            return $task->due_date->gt(now()->addDay()) && !$task->completed;
        });
        $historyTasks = $tasks->where('completed', true);

        return view('view', compact('todayTasks', 'tomorrowTasks', 'upcomingTasks', 'historyTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:Urgent,High,Normal,Low',
            'subtasks' => 'nullable|array',
            'subtasks.*' => 'nullable|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'user_id' => Auth::id(),
        ]);

        if ($request->subtasks) {
            foreach ($request->subtasks as $subtaskTitle) {
                if (!empty(trim($subtaskTitle))) {
                    Subtask::create([
                        'title' => trim($subtaskTitle),
                        'task_id' => $task->id,
                    ]);
                }
            }
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('subtasks')->findOrFail($id);
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'sometimes|required|date',
            'priority' => 'sometimes|required|in:Urgent,High,Normal,Low',
            'completed' => 'sometimes|boolean',
        ]);

        $task->update($request->only(['title', 'description', 'due_date', 'priority', 'completed']));

        // If task is marked as completed, move to history
        if ($request->has('completed') && $request->completed) {
            // Mark all subtasks as completed too
            $task->subtasks()->update(['completed' => true]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['success' => true]);
    }

    public function updateSubtask(Request $request, $id)
    {
        $subtask = Subtask::findOrFail($id);
        $subtask->update(['completed' => $request->completed]);

        return response()->json(['success' => true]);
    }

    public function duplicate($id)
    {
        $task = Task::findOrFail($id);
        $newTask = $task->replicate();
        $newTask->title = $task->title . ' (Copy)';
        $newTask->save();

        foreach ($task->subtasks as $subtask) {
            $newSubtask = $subtask->replicate();
            $newSubtask->task_id = $newTask->id;
            $newSubtask->save();
        }

        return response()->json(['success' => true]);
    }

    public function storeSubtask(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'title' => 'required|string|max:255',
        ]);

        Subtask::create([
            'task_id' => $request->task_id,
            'title' => $request->title,
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the schedule view with calendar and tasks.
     */
    public function schedule(Request $request)
    {
        $user = Auth::user();
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);

        $startOfMonth = \Carbon\Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = \Carbon\Carbon::create($year, $month, 1)->endOfMonth();

        $tasks = $user->tasks()->with('subtasks')->whereBetween('due_date', [$startOfMonth, $endOfMonth])->get();

        $tasksByDate = $tasks->groupBy(function($task) {
            return $task->due_date->format('Y-m-d');
        });

        // Separate queries for better performance - exclude completed tasks from allTasks
        $allTasks = $user->tasks()->with('subtasks')
            ->where('completed', false)
            ->orderBy('due_date', 'asc')
            ->orderByRaw("CASE priority WHEN 'Urgent' THEN 1 WHEN 'High' THEN 2 WHEN 'Normal' THEN 3 WHEN 'Low' THEN 4 END")
            ->get();

        $todayTasks = $user->tasks()->with('subtasks')
            ->where('due_date', now()->toDateString())
            ->where('completed', false)
            ->get();

        $upcomingTasks = $user->tasks()->with('subtasks')
            ->where('due_date', '>', now()->toDateString())
            ->where('completed', false)
            ->get();

        $completedTasks = $user->tasks()->with('subtasks')
            ->where('completed', true)
            ->get();

        return view('schedule', compact('tasksByDate', 'month', 'year', 'todayTasks', 'upcomingTasks', 'completedTasks', 'allTasks'));
    }
}
