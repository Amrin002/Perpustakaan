<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_buku',
        'penulis',
        'penerbit',
        'jumlah_buku',
        'categorybuku_id',
    ];
     // Definisikan relasi dengan CategoryBuku
     public function categorybuku()
     {
        return $this->belongsTo(CategoryBuku::class, 'categorybuku_id');
    }
}
