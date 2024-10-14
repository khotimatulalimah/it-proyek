<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mendefinisikan kelas migrasi dengan anonymous class
return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel detail.
     */
    public function up(): void
    {
        // Membuat tabel 'detail'
        Schema::create('detail', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom 'id' dengan tipe auto-increment
            $table->string('nama_karyawan'); // Kolom teks untuk menyimpan nama karyawan
            $table->string('nama_barang'); // Kolom teks untuk menyimpan nama barang
            $table->date('tanggal'); // Kolom untuk menyimpan tanggal transaksi
            $table->decimal('harga', 8, 2); // Kolom untuk menyimpan harga dengan presisi 8 dan skala 2 (contoh: 123456.78)
            $table->decimal('jumlah', 8, 2); // Kolom untuk menyimpan jumlah dengan presisi 8 dan skala 2 (contoh: 123456.78)
            $table->string('metode_pembayaran'); // Kolom teks untuk menyimpan metode pembayaran (misal: cash, credit card, dll.)
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' untuk manajemen waktu
        });
    }

    /**
     * Membalikkan migrasi untuk menghapus tabel detail.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail'); // Menghapus tabel 'detail' jika ada
    }
};
