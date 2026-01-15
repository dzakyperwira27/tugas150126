<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'kota' => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
        ], [
            'nama.required' => 'Nama supplier tidak boleh kosong',
            'nama.regex'    => 'Nama supplier hanya boleh huruf',
            'kota.required' => 'Kota tidak boleh kosong',
            'kota.regex'    => 'Kota tidak boleh mengandung angka',
        ]);

        Supplier::create([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil ditambahkan');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kota' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil diupdate');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Data supplier berhasil dihapus');
    }
}
