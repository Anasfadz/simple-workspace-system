<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('portfolio'))->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => redirect()->route('workspaces.index'))->name('dashboard');
    Route::resource('workspaces', WorkspaceController::class);

    Route::resource('workspaces.tasks', TaskController::class)
        ->scoped([
            'task' => 'id', 
        ])->except(['index','show']); 
    
    Route::patch(
        '/workspaces/{workspace}/tasks/{task}/toggle',
        [TaskController::class, 'toggle']
    )->name('workspaces.tasks.toggle');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
