<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::get('/tasks/upcoming', [TaskController::class, 'upcoming']);
    Route::apiResource('tasks', TaskController::class);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/me', function (Request $request) {
        return response()->json($request->user());
    });
});
