<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

// Route untuk menampilkan semua data barang
Route::get('/it', function() {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('barang.it', ['posts' => $posts]);
});

// Route untuk menampilkan form pembuatan item baru
Route::post('/create-post', [PostController::class, 'createPost']); // Menangani pembuatan item baru

// Route untuk menampilkan form edit item
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']); // Menangani pengeditan item 

// Route untuk memperbarui data item
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']); // Menangani pembaruan item

// Route untuk menghapus data item
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']); // Menangani penghapusan item
