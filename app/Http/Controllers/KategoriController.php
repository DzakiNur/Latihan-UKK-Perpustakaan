<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create($request->all());

        if(!$kategori) {
            return back()->with('error', 'Gagal membuat kategori!');
        }
        return redirect('admin.kategori.index')->with('success', 'Kategori berhasil dibuat');
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id);

        if(!$kategori) {
            return back()->with('error', 'Kategori tidak ditemukan!');
        }
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::where('id', $id)->update($request->all());

        if(!$kategori) {
            return back()->with('error', 'Gagal mengubah data!');
        }
        return view('admin.kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        $kategori = Kategori::where('id', $id)->delete();

        if(!$kategori) {
            return back()->with('error', 'Gagal menghapus kategori!');
        }
        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
