<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorybuku extends Model
{
    use HasFactory;
    protected $fillable = ['nama']; // sesuaikan dengan kolom yang ada di tabel category_bukus

    // Definisikan relasi dengan Buku
    public function bukus()
    {
        return $this->hasMany(Buku::class, 'categorybuku_id');
    }
}
