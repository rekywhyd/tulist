<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home'); // Mengarahkan ke home.blade.php
})->middleware(['auth', 'verified'])->name('home');

Route::get('/schedule', [App\Http\Controllers\TaskController::class, 'schedule'])->middleware(['auth', 'verified'])->name('schedule');

Route::middleware('auth')->group(function () {
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

require __DIR__.'/auth.php';
