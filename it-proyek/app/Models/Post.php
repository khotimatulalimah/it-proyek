<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'post'; // Pastikan ini sesuai dengan nama tabel di database

    // Field yang dapat diisi secara massal
    protected $fillable = ['nama_item', 'kategori', 'harga', 'stok'];
}
    