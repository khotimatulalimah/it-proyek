<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

// Route untuk menampilkan halaman laporan
Route::get('/laporan', function() {
    $laporans = Post::orderBy('created_at', 'desc')->get(); // Mengambil data dari database
    return view('laporan', ['laporans' => $laporans]); // Mengirim data ke view laporan
})->name('laporan');

// Route untuk menangani pembuatan post baru
Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');
