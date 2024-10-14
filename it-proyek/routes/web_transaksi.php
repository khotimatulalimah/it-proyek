<?php

use App\Models\Post_transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController_transaksi;

// Route untuk menampilkan detail dan mengumpulkan data dari database
Route::get('/detail', function() {
    $posts = Post_transaksi::orderBy('created_at', 'desc')->get();
    return view('transaksi.detail', ['posts' => $posts]);
});

// Route untuk menampilkan form pembuatan item baru
Route::post('/create-post', [PostController_transaksi::class, 'createPost']); // Menangani pembuatan item baru
