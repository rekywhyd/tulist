<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', [App\Http\Controllers\TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('view');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/home', function () {
    $user = Auth::user();

    $tasks = $user->tasks()->with('subtasks')->get();

    $todayTasks = $tasks->filter(function ($task) {
        return $task->due_date->isToday() && !$task->completed;
    });
    $tomorrowTasks = $tasks->filter(function ($task) {
        return $task->due_date->isTomorrow() && !$task->completed;
    });
    $upcomingTasks = $tasks->filter(function ($task) {
        return $task->due_date->gt(now()->addDay()) && !$task->completed;
    });
    $historyTasks = $tasks->filter(function ($task) {
        return $task->completed;
    });

    $todayCount = $todayTasks->count();
    $tomorrowCount = $tomorrowTasks->count();
    $upcomingCount = $upcomingTasks->count();

    return view('home', compact('todayTasks', 'tomorrowTasks', 'upcomingTasks', 'historyTasks', 'todayCount', 'tomorrowCount', 'upcomingCount'));
})
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/schedule', [App\Http\Controllers\TaskController::class, 'schedule'])
    ->middleware(['auth', 'verified'])
    ->name('schedule');
Route::post('/schedule', [App\Http\Controllers\TaskController::class, 'schedule'])
    ->middleware(['auth', 'verified'])
    ->name('schedule');

Route::get('/help', [PageController::class, 'help'])
    ->name('help')
    ->middleware('auth');
Route::get('/privacy', [PageController::class, 'privacy'])
    ->name('privacy')
    ->middleware('auth');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tasks', TaskController::class);
    Route::patch('subtasks/{id}', [TaskController::class, 'updateSubtask'])->name('subtasks.update');
    Route::post('tasks/{id}/duplicate', [TaskController::class, 'duplicate'])->name('tasks.duplicate');
    Route::post('subtasks', [TaskController::class, 'storeSubtask'])->name('subtasks.store');
});

Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);

require __DIR__ . '/auth.php';
