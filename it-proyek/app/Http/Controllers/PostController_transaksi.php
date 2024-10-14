<?php

namespace App\Http\Controllers;

use App\Models\Post_transaksi; // Mengimpor model Post_transaksi
use Illuminate\Http\Request; // Mengimpor kelas Request untuk menangani permintaan HTTP

class PostController_transaksi extends Controller
{
    // Metode untuk membuat entri data baru
    public function createPost(Request $request) {
        // Validasi data yang diterima dari permintaan
        $incomingField = $request->validate([
            'nama_karyawan' => 'required', // Kolom nama_karyawan harus diisi
            'nama_barang' => 'required', // Kolom nama_barang harus diisi
            'tanggal' => 'required', // Kolom tanggal harus diisi
            'harga' => 'required|numeric', // Kolom harga harus diisi dan merupakan angka
            'jumlah' => 'required|numeric', // Kolom jumlah harus diisi dan merupakan angka
            'metode_pembayaran' => 'required' // Kolom metode_pembayaran harus diisi
        ]);

        // Menghilangkan tag HTML dari input untuk keamanan
        foreach ($incomingField as $key => $value) {
            $incomingField[$key] = strip_tags($value);
        }

        // Menyimpan data baru ke database
        Post_transaksi::create($incomingField);
        
        // Mengarahkan kembali ke halaman detail setelah penyimpanan
        return redirect('/detail');
    }
}
