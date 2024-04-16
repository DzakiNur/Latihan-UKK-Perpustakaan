<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KategoriController extends Controller
{
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        if(!$kategori) {
            return back()->with('error', 'Gagal membuat kategori!');
        }
        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dibuat');
    }

    public function edit($id)
    {
        // $category = Kategori::get();
        // $kategori = Kategori::where('id', $id)->first();

        // return redirect()->route('admin.category.edit', ['id' => $id])->with(compact('category', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategori = Kategori::where('id', $id)->update($validate);

        if(!$kategori) {
            return back()->with('error', 'Gagal mengubah data!');
        }
        return redirect()->route('admin.category')->with('success', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        
        if(!$kategori) {
            return back()->with('error', 'Kategori tidak dapat ditemukan!');
        }
        $kategori->delete();
        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus');
    }
}
