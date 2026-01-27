<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Anggota;
use App\Models\Barang;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    // Tampilkan daftar barang masuk
    public function index()
    {
        $data = Masuk::with(['anggota', 'barang'])->get();
        return view('masuk.index', compact('data'));
    }

    // Tampilkan form tambah barang masuk
    // create()
public function create()
{
    $anggotas = Anggota::all(); // semua anggota
    $barangs  = Barang::all();  // semua barang

    return view('masuk.create', compact('anggotas', 'barangs'));
}


    // Simpan data barang masuk
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id'   => 'required|exists:anggotas,id',
            'barang_id'    => 'required|exists:barangs,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk'=> 'required|date', // tambahkan validasi tanggal
        ]);

        Masuk::create([
            'anggota_id'   => $request->anggota_id,
            'barang_id'    => $request->barang_id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'tanggal_masuk'=> $request->tanggal_masuk, // pastikan diisi
        ]);

        return redirect()->route('masuk.index')->with('success', 'Barang masuk berhasil dicatat!');
    }
}
