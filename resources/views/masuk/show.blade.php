@extends('layouts.app')

@section('content')
<h1>Detail Peminjaman</h1>
<a href="{{ route('pinjam.index') }}">Kembali ke Daftar</a>
<hr>

<table cellpadding="8">
    <tr>
        <td>Nama Anggota</td>
        <td>:</td>
        <td>{{ $item->anggota->nama }}</td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td>{{ $item->produk->nama_barang }}</td>
    </tr>
    <tr>
        <td>Jumlah Pinjam</td>
        <td>:</td>
        <td>{{ $item->jumlah_pinjam }}</td>
    </tr>
    <tr>
        <td>Tanggal Pinjam</td>
        <td>:</td>
        <td>{{ $item->tanggal_pinjam }}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $item->status }}</td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>{{ $item->keterangan ?? '-' }}</td>
    </tr>
</table>

@endsection
