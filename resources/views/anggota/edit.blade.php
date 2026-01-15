@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

<h1>Edit Anggota</h1>
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

<form action="{{ route('anggota.update', $anggota) }}" method="POST">
@csrf
@method('PUT')

    <table>

        <tr>
            <td>NAMA ANGGOTA</td>
            <td>
                <input type="text" name="nama"
                       value="{{ old('nama', $anggota->nama) }}">

                @error('nama')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>KOTA</td>
            <td>
                <textarea name="kota">{{ old('kota', $anggota->kota) }}</textarea>

                @error('kota')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>NOMOR HP</td>
            <td>
                <input type="number" name="nomor_hp"
                       value="{{ old('nomor_hp', $anggota->nomor_hp) }}">

                @error('nomor_hp')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>
                <a href="{{ route('anggota.index') }}">Kembali</a>
            </td>
            <td>
                <button type="submit" class="btn">Update Data Anggota</button>
            </td>
        </tr>

    </table>
</form>

@endsection
