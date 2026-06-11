<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = DB::table('member')->get();
        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required',
            'nomor_member' => 'required',
            'alamat' => 'required',
            'tgl_mendaftar' => 'required',
            'tgl_terakhir_bayar' => 'required',
        ]);

        DB::table('member')->insert([
            'nama_member' => $request->nama_member,
            'nomor_member' => $request->nomor_member,
            'alamat' => $request->alamat,
            'tgl_mendaftar' => $request->tgl_mendaftar,
            'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
        ]);

        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $member = DB::table('member')->where('id_member', $id)->first();
        
        return view('member.form', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_member' => 'required',
            'nomor_member' => 'required',
            'alamat' => 'required',
            'tgl_mendaftar' => 'required',
            'tgl_terakhir_bayar' => 'required',
        ]);

        DB::table('member')->where('id_member', $id)->update([
            'nama_member' => $request->nama_member,
            'nomor_member' => $request->nomor_member,
            'alamat' => $request->alamat,
            'tgl_mendaftar' => $request->tgl_mendaftar,
            'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
        ]);

        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui!');
    }

    // DELETE: Menghapus data member (Pengganti deleteMember)
    public function destroy($id)
    {
        DB::table('member')->where('id_member', $id)->delete();
        return redirect()->route('member.index')->with('success', 'Member berhasil dihapus');
    }
}