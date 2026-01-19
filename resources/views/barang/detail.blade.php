@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')

<h1 class="mt-4 mb-4">Detail Barang</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-eye me-1"></i>
        Detail Data Barang (ID: {{ $barang->id }})
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Barang</th>
                <td>{{ $barang->nama_barang }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $barang->deskripsi }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
            </tr>
        </table>

        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

@endsection
