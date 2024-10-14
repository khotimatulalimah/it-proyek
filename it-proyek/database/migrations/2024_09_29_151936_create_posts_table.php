<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {  // Ganti 'posts' menjadi 'barang'
            $table->id();
            $table->string('nama_item');  // Kolom untuk nama item
            $table->string('kategori');   // Kolom untuk kategori
            $table->decimal('harga', 10, 2);  // Kolom untuk harga dengan 2 angka desimal
            $table->integer('stok');  // Kolom untuk stok
            $table->timestamps();  // Kolom untuk timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');  // Ganti 'posts' menjadi 'barang'
    }
};
