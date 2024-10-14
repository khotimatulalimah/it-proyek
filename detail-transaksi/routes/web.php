<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/detail', function() {
    return view('detail');
});

Route::get('/detail', function() {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('detail', ['posts' => $posts]);
});

// Route untuk menampilkan form pembuatan item baru
Route::post('/create-post', [PostController::class, 'createPost']); // Menangani pembuatan item baru

