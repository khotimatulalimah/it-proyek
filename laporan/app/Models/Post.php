<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama_karyawan', 'tanggal', 'pendapatan'];
    
    // Jika tabel sudah dinamai 'posts', tidak perlu menyetel $table
    protected $table = 'posts';
}
