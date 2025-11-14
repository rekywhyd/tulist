<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Subtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

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

        return view('dashboard', compact('todayTasks', 'tomorrowTasks', 'upcomingTasks', 'historyTasks'));
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
            'subtasks.*' => 'string|max:255',
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
                if (!empty($subtaskTitle)) {
                    Subtask::create([
                        'title' => $subtaskTitle,
                        'task_id' => $task->id,
                    ]);
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        if ($request->has('completed')) {
            $task->update(['completed' => $request->completed]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateSubtask(Request $request, $id)
    {
        $subtask = Subtask::findOrFail($id);
        $subtask->update(['completed' => $request->completed]);

        return response()->json(['success' => true]);
    }
}
