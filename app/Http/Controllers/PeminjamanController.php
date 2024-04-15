<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id',
            'buku_id',
            'tanggal_pinjam',
            'tanggal_pengembalian',
            'status',
        ]);
        
        $check = Peminjaman::where('user_id', '=', Auth::user()->id)->where('buku_id', '=', $request->buku_id)->exists();
        if($check) {
            return back()->with('error', 'Buku sudah dipinjam!');
        }
        $peminjaman = Peminjaman::create([
            'user_id' => Auth::user()->id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_pengembalian' => null,
            'status' => false,
        ]);
        dd($peminjaman);
        
        if(!$peminjaman) {
            return back()->with('error', 'Gagal meminjam buku!');
        }
        return back()->with('success', 'Berhasil meminjam buku');
    }
}
