<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $buku = DB::table('buku')->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2026',
        ], [
            'judul_buku.required'   => 'Judul buku wajib diisi.',
            'judul_buku.string'     => 'Judul harus berupa teks.',
            'penulis.required'      => 'Penulis wajib diisi.',
            'penulis.string'        => 'Penulis harus berupa teks.',
            'penerbit.required'     => 'Penerbit wajib diisi.',
            'penerbit.string'       => 'Penerbit harus berupa teks.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.numeric'  => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt'       => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt'       => 'Tahun terbit harus lebih kecil dari 2026.',            
        ]);

        DB::table('buku')->insert([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = DB::table('buku')->where('id_buku', $id)->first();
        return view('buku.form', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2026',
        ], [
            'judul_buku.required'   => 'Judul buku wajib diisi.',
        'judul_buku.string'     => 'Judul harus berupa teks.',
        'penulis.required'      => 'Penulis wajib diisi.',
        'penulis.string'        => 'Penulis harus berupa teks.',
        'penerbit.required'     => 'Penerbit wajib diisi.',
        'penerbit.string'       => 'Penerbit harus berupa teks.',
        'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
        'tahun_terbit.numeric'  => 'Tahun terbit harus berupa angka.',
        'tahun_terbit.gt'       => 'Tahun terbit harus lebih besar dari 1800.',
        'tahun_terbit.lt'       => 'Tahun terbit harus lebih kecil dari 2026.',            
        ]);

        DB::table('buku')->where('id_buku', $id)->update([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('buku')->where('id_buku', $id)->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}