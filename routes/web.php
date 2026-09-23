<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);


    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/create', [TaskController::class, 'create']);
    Route::post('/tasks', [TaskController::class, 'store']);
    // Route::get('/tasks/{task}', [TaskController::class, 'show']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});
