<?php

namespace App\Http\Controllers;

use App\Models\Post; // Ganti Post dengan Barang
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/it')->with('success', 'Data barang berhasil dihapus.');
    }

    public function actuallyUpdatePost(Post $post, Request $request)
    {
        $incomingField = $request->validate([
            'nama_item' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer'
        ]);

        // Sanitasi input
        $incomingField['nama_item'] = strip_tags($incomingField['nama_item']);
        $incomingField['kategori'] = strip_tags($incomingField['kategori']);
        $incomingField['harga'] = strip_tags($incomingField['harga']);
        $incomingField['stok'] = strip_tags($incomingField['stok']);

        $post->update($incomingField);
        return redirect('/it')->with('success', 'Data barang berhasil diupdate.');
    }

    public function showEditScreen(Post $post)
    {
        return view('barang.edit-post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        // Validasi data yang diterima
        $incomingField = $request->validate([
            'nama_item' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer'
        ]);

        // Sanitasi input
        $incomingField['nama_item'] = strip_tags($incomingField['nama_item']);
        $incomingField['kategori'] = strip_tags($incomingField['kategori']);
        $incomingField['harga'] = strip_tags($incomingField['harga']);
        $incomingField['stok'] = strip_tags($incomingField['stok']);

        // Simpan data ke dalam tabel barang
        Post::create($incomingField);

        // Redirect setelah menyimpan data dengan pesan sukses
        return redirect('/it')->with('success', 'Data barang berhasil disimpan.');
    }
}
