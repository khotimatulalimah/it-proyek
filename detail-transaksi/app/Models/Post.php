<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
  
    // Field yang dapat diisi secara massal
    protected $fillable = ['nama_karyawan', 'nama_barang', 'tanggal', 'harga', 'jumlah', 'metode_pembayaran'];
}
    