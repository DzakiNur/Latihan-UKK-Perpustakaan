<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function create()
    {
        $user = User::get();
        $buku = Buku::get();
        return view('admin.koleksi.create', compact('user', 'buku'));
    }

    public function store(Request $request)
    {
        $koleksi = Koleksi::create($request->all());

        if(!$koleksi) {
            return back()->with('error', 'Gagal membuat koleksi!');
        }
        return redirect('admin.koleksi.index')->with('success', 'Koleksi berhasil dibuat');
    }

    public function edit($id)
    {
        $user = User::get();
        $buku = Buku::get();
        $koleksi = Koleksi::where('id', $id);

        if(!$koleksi) {
            return back()->with('error', 'Koleksi tidak ditemukan!');
        }
        return view('admin.koleksi.edit', compact('koleksi', 'user', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $koleksi = Koleksi::where('id', $id)->update($request->all());

        if(!$koleksi) {
            return back()->with('error', 'Gagal mengubah data!');
        }
        return view('admin.koleksi.index')->with('success', 'Koleksi berhasil diubah');
    }

    public function delete($id)
    {
        $koleksi = Koleksi::where('id', $id)->delete();

        if(!$koleksi) {
            return back()->with('error', 'Gagal menghapus koleksi!');
        }
        return back()->with('success', 'Koleksi berhasil dihapus');
    }
}
