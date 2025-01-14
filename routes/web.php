<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    $posts = [];
    $allPosts = Post::latest()->get();
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts], ['allPosts' => $allPosts]);
});

Route::get('/food', function () {
    $posts = [];
    $allPosts = Post::latest()->get();
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('food', ['posts' => $posts], ['allPosts' => $allPosts]);
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);

//Route::get('/food', function () {
//    return view('food');
//});

// Blog post routes

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
