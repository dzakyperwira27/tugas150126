@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')

<h1>Detail Data dengan ID {{ $barang->id }}</h1>

<table>
    <tr>
        <td>NAMA BARANG</td>
        <td>: {{ $barang->nama_barang }}</td>
    </tr>
    <tr>
        <td>DESKRIPSI</td>
        <td>: {{ $barang->deskripsi }}</td>
    </tr>
    <tr>
        <td>HARGA</td>
        <td>: {{ $barang->harga }}</td>
    </tr>
    <tr>
        <td>
            <a href="{{ route('barang.index') }}">Kembali</a>
        </td>
        <td></td>
    </tr>
</table>

@endsection
