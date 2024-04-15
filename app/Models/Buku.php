<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'gambar',
        'tahun_terbit',
        'sinopsis',
        'kategori_id'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function koleksi() {
        return $this->hasMany(Koleksi::class);
    }

    public function ulasan() {
        return $this->hasMany(Ulasan::class);
    }

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
}
