@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

<h1>Edit Barang</h1>

<form action="{{ route('barang.update', $barang->id) }}" method="POST">
@csrf
@method('PUT')

    <table>

        <tr>
            <td>NAMA BARANG</td>
            <td>
                <input type="text" name="nama_barang"
                       value="{{ old('nama_barang', $barang->nama_barang) }}">

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
                <textarea name="deskripsi">{{ old('deskripsi', $barang->deskripsi) }}</textarea>

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
                <input type="number" name="harga"
                       value="{{ old('harga', $barang->harga) }}">

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
                <button type="submit" class="btn">Update Data</button>
            </td>
        </tr>

    </table>
</form>

@endsection
