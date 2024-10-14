<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/baru', function () {
    return view('baru');
});

Route::get('/baru', function () {
    $posts = \App\Models\Post::all();
    return view('baru', ['posts' => $posts]);
});

Route::post('/create-post',[PostController::class,'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);

Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);