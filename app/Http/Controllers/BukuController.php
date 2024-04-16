<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BukuController extends Controller
{
    public function create()
    {
        $category = Kategori::get();
        return view('admin.buku.add', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $fileName = time().'__'.$request->file('gambar')->getClientOriginalName();
        $data['gambar'] = $fileName;
        
        $buku = Buku::create($data);
        $path = $request->file('gambar')->storeAs('images', $fileName, 'public');
        
        if(!$buku) {
            return back()->with('error', 'Gagal membuat buku!');
        }
        return redirect()->route('admin.book')->with('success', 'Buku berhasil dibuat');
    }

    public function edit($id)
    {
        $book = Buku::where('id', $id)->first();
        $category = Kategori::get();

        if(!$book) {
            return back()->with('error', 'Buku tidak ditemukan!');
        }
        return view('admin.buku.edit', compact('book', 'category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $fileName = time().'__'.$request->file('gambar')->getClientOriginalName();
        $data['gambar'] = $fileName;
        
        $buku = Buku::where('id', $id)->first();
        if(!$buku) {
            return back()->with('error', 'Buku tidak ditemukan!');
        }
        $result = $buku->update($data);
        $path = $request->file('gambar')->storeAs('images', $fileName, 'public');
        
        if(!$result) {
            return back()->with('error', 'Gagal membuat buku!');
        }
        return redirect()->route('admin.book')->with('success', 'Buku berhasil diubah!');

    }

    public function delete($id)
    {
        $buku = Buku::where('id', $id)->first();
        
        if(!$buku) {
            return back()->with('error', 'Gagal menghapus buku!');
        }
        $buku->delete();
        return redirect()->route('admin.book')->with('success', 'Buku berhasil dihapus');
    }
}
