<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'     => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
                'kota'     => 'required|min:3|max:50|regex:/^[A-Za-z\s]+$/',
                'nomor_hp' => 'required|numeric|digits_between:10,15',
            ],
            [
                'nama.required'     => 'Nama anggota tidak boleh kosong',
                'nama.regex'        => 'Nama hanya boleh huruf',
                'kota.required'     => 'Kota tidak boleh kosong',
                'kota.regex'        => 'Kota hanya boleh huruf',
                'nomor_hp.required' => 'Nomor HP wajib diisi',
                'nomor_hp.numeric'  => 'Nomor HP harus angka',
            ]
        );

        Anggota::create($request->only([
            'nama',
            'kota',
            'nomor_hp'
        ]));

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function show(Anggota $anggota)
    {
        return view('anggota.detail', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate(
            [
                'nama'     => 'required|min:3|max:50',
                'kota'     => 'required|min:3|max:50',
                'nomor_hp' => 'required|numeric|digits_between:10,15',
            ],
            [
                'nama.required'     => 'Nama anggota wajib diisi',
                'kota.required'     => 'Kota wajib diisi',
                'nomor_hp.required' => 'Nomor HP wajib diisi',
            ]
        );

        $anggota->update($request->only([
            'nama',
            'kota',
            'nomor_hp'
        ]));

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus');
    }
}
