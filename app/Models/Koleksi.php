<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = 'koleksi_pribadi';
    protected $fillable = [
        'user_id',
        'buku_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku() {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
