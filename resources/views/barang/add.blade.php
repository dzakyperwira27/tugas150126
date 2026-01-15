@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

<h1>Tambah Barang Baru</h1>

<form action="{{ route('barang.store') }}" method="POST">
@csrf
    <table>
        <tr>
            <td>NAMA BARANG</td>
            <td>
                <input type="text" name="nama_barang">
                @error('nama_barang')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>DESKRIPSI</td>
            <td>
                <textarea name="deskripsi"></textarea>
                @error('deskripsi')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>HARGA</td>
            <td>
                <input type="text" name="harga">
                @error('harga')
                    <div style="color:red; font-size:14px;">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>
                <a href="{{ route('barang.index') }}">Kembali</a>
            </td>
            <td>
                <button type="submit" class="btn">Simpan ke Database</button>
            </td>
        </tr>
    </table>
</form>

@endsection
