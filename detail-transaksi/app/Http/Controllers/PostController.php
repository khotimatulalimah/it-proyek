<?php

namespace App\Http\Controllers;

use App\Models\Post; // Mengimpor model Post
use Illuminate\Http\Request; // Mengimpor kelas Request untuk menangani permintaan HTTP

class PostController extends Controller
{
    // Metode untuk membuat entri data baru
    public function createPost(Request $request) {
        // Validasi data yang diterima dari permintaan
        $incomingField = $request->validate([
            'nama_karyawan' => 'required', // Kolom nama_karyawan harus diisi
            'nama_barang' => 'required', // Kolom nama_barang harus diisi
            'tanggal' => 'required', // Kolom tanggal harus diisi
            'harga' => 'required', // Kolom harga harus diisi
            'jumlah' => 'required', // Kolom jumlah harus diisi
            'metode_pembayaran' => 'required' // Kolom metode_pembayaran harus diisi
        ]);

        // Menghilangkan tag HTML dari input untuk keamanan
        $incomingField['nama_karyawan'] = strip_tags($incomingField['nama_karyawan']);
        $incomingField['nama_barang'] = strip_tags($incomingField['nama_barang']);
        $incomingField['tanggal'] = strip_tags($incomingField['tanggal']);
        $incomingField['harga'] = strip_tags($incomingField['harga']);
        $incomingField['jumlah'] = strip_tags($incomingField['jumlah']);
        $incomingField['metode_pembayaran'] = strip_tags($incomingField['metode_pembayaran']); // Menghilangkan tag HTML dari metode_pembayaran

        // Menyimpan data baru ke database
        Post::create($incomingField);
        
        // Mengarahkan kembali ke halaman detail setelah penyimpanan
        return redirect('/detail');
    }
}
