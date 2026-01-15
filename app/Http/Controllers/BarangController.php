<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_barang' => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'deskripsi'   => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'harga'       => 'required|numeric|min:1',
        ], [
            'nama_barang.required' => 'Nama barang gak boleh kosong bos',
            'nama_barang.regex' => 'Nama barang gak boleh kosong oy',
            'deskripsi.regex' => 'Nama barang tidak boleh mengandung angka',
            'deskripsi.required' => 'Nama barang tidak boleh  angka',
            'harga.numeric' => 'Harus berupa angka',
        ]);


        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus');
    }
}
