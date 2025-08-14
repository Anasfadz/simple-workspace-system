<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', fn() => redirect()->route('workspaces.index'));

Route::middleware(['auth'])->group(function () {
    Route::resource('workspaces', WorkspaceController::class);

    // Nested tasks under a workspace
    Route::resource('workspaces.tasks', TaskController::class)
        ->scoped([
            'task' => 'id', // keep default
        ])->except(['index','show']); // tasks listed on workspace.show
});

require __DIR__.'/auth.php';
