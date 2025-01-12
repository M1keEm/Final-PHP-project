<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);
