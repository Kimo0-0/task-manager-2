<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/tasks/upcoming', [TaskController::class, 'upcoming'])->name('tasks.upcoming');
//     Route::resource('tasks', TaskController::class);
// });

require __DIR__.'/auth.php';
