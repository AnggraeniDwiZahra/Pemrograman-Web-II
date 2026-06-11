<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
            ->join('member', 'peminjaman.id_member', '=', 'member.id_member')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id_buku')
            ->select('peminjaman.*', 'member.nama_member', 'buku.judul_buku')
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $members = DB::table('member')->get();
        $buku = DB::table('buku')->get();
        return view('peminjaman.form', compact('members', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_member' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ], [
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh kurang dari tanggal pinjam!'
        ]);

        DB::table('peminjaman')->insert([
            'id_member' => $request->id_member,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function edit($id)
    {
        $transaksi = DB::table('peminjaman')->where('id_peminjaman', $id)->first();
        $members = DB::table('member')->get();
        $buku = DB::table('buku')->get();

        return view('peminjaman.form', compact('transaksi', 'members', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_member' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ], [
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh kurang dari tanggal pinjam!'
        ]);

        DB::table('peminjaman')->where('id_peminjaman', $id)->update([
            'id_member' => $request->id_member,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('peminjaman')->where('id_peminjaman', $id)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Riwayat transaksi berhasil dihapus!');
    }
}