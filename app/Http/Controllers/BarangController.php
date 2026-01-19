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
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.regex'    => 'Nama barang hanya boleh huruf',
            'deskripsi.required'   => 'Deskripsi tidak boleh kosong',
            'deskripsi.regex'      => 'Deskripsi hanya boleh huruf',
            'harga.numeric'        => 'Harga harus berupa angka',
            'gambar.image'         => 'File harus berupa gambar',
            'gambar.mimes'         => 'Format gambar harus jpg, jpeg, png, atau gif',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/barang');
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'gambar'      => $gambarPath ? basename($gambarPath) : null,
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
            'nama_barang' => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'deskripsi'   => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'harga'       => 'required|numeric|min:1',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.regex'    => 'Nama barang hanya boleh huruf',
            'deskripsi.required'   => 'Deskripsi tidak boleh kosong',
            'deskripsi.regex'      => 'Deskripsi hanya boleh huruf',
            'harga.numeric'        => 'Harga harus berupa angka',
            'gambar.image'         => 'File harus berupa gambar',
            'gambar.mimes'         => 'Format gambar harus jpg, jpeg, png, atau gif',
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
        ];

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/barang');
            $data['gambar'] = basename($gambarPath);
        }

        $barang->update($data);

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
