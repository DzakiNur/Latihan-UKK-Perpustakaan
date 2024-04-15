<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function buku()
    {
        $book = Buku::with('kategori')->get();
        return view('admin.buku.index', compact('book'));
    }

    public function kategori()
    {
        $category = Kategori::get();
        return view('admin.kategori.index', compact('category'));
    }

    public function koleksi()
    {
        $collection = Koleksi::with('user', 'buku')->where('user_id', Auth::user()->id)->get();
        return view('admin.buku.collection', compact('collection'));
    }

    public function peminjaman()
    {
        $borrowing = Peminjaman::with('user', 'buku')->where('user_id', Auth::user()->id)->get();
        return view('admin.buku.borrowing', compact('borrowing'));
    }

    public function ulasan()
    {
        return view('admin.ulasan.index');
    }

    public function user()
    {
        $user = User::get();
        return view('admin.user.index', compact('user'));
    }

    public function createUser()
    {
        return view('admin.user.add');
    }
}
