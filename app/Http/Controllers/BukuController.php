<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function create()
    {
        $kategori = Kategori::get();
        return view('admin.buku.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $buku = Buku::create($request->all());

        if(!$buku) {
            return back()->with('error', 'Gagal membuat buku!');
        }
        return redirect('admin.buku')->with('success', 'Buku berhasil dibuat');
    }

    public function edit($id)
    {
        $buku = Buku::where('id', $id);
        $kategori = Kategori::get();

        if(!$buku) {
            return back()->with('error', 'Buku tidak ditemukan!');
        }
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::where('id', $id)->update($request->all());

        if(!$buku) {
            return back()->with('error', 'Gagal mengubah data!');
        }
        return view('admin.buku.index')->with('success', 'Buku berhasil diubah');
    }

    public function delete($id)
    {
        $buku = Buku::where('id', $id)->delete();

        if(!$buku) {
            return back()->with('error', 'Gagal menghapus buku!');
        }
        return back()->with('success', 'Buku berhasil dihapus');
    }
}
