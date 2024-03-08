<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function buku()
    {
        return view('admin.buku.index');
    }

    public function kategori()
    {
        return view('admin.kategori.index');
    }

    public function koleksi()
    {
        return view('admin.koleksi.index');
    }

    public function peminjaman()
    {
        return view('admin.peminjaman.index');
    }

    public function ulasan()
    {
        return view('admin.ulasan.index');
    }
}
