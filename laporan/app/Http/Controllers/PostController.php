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
            'tanggal' => 'required', // Kolom tanggal harus diisi
            'pendapatan' => 'required' // Kolom pendapatan harus diisi
        ]);

        // Menghilangkan tag HTML dari input untuk keamanan
        $incomingField['nama_karyawan'] = strip_tags($incomingField['nama_karyawan']);
        $incomingField['tanggal'] = strip_tags($incomingField['tanggal']);
        $incomingField['pendapatan'] = strip_tags($incomingField['pendapatan']);
        
        // Menyimpan data baru ke database
        Post::create($incomingField);
        
        // Mengarahkan kembali ke halaman laporan setelah penyimpanan
        return redirect()->route('laporan');
    }
}
