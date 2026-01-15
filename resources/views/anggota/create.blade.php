@extends('layouts.app')

@section('content')

<h1>Tambah Anggota</h1>

{{-- NOTIFIKASI --}}
@if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:10px;
        border:1px solid #c3e6cb;
    ">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('anggota.store') }}" method="POST">
@csrf
<table width="400">
    <tr>
        <td>Nama</td>
        <td>
            <input type="text" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>
            <input type="text" name="kota" value="{{ old('kota') }}">
            @error('kota')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>Nomor HP</td>
        <td>
        <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}">
        @error('nomor_hp')
            <div style="color:red">{{ $message }}</div>
        @enderror
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <button type="submit">Simpan</button>
            <a href="{{ route('anggota.index') }}">Kembali</a>
        </td>
    </tr>
</table>
</form>

@endsection
