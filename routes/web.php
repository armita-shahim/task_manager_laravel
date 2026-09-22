<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function ()
{
    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::post('/register', [AuthController::class, 'register']);


    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function()
{
    Route::post('/logout', [AuthController::class, 'logout']);

});



