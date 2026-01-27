@extends('layouts.app')

@section('content')
<h1>Detail Peminjaman Barang</h1>
<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Anggota</th>
        <td>{{ $item->anggota->nama }}</td>
    </tr>
    <tr>
        <th>Barang</th>
        <td>{{ $item->produk->nama_barang }}</td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td>{{ $item->jumlah_pinjam }}</td>
    </tr>
    <tr>
        <th>Tanggal Pinjam</th>
        <td>{{ $item->tanggal_pinjam }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->status }}</td>
    </tr>
    <tr>
        <th>Keterangan</th>
        <td>{{ $item->keterangan ?? '-' }}</td>
    </tr>
</table>

<br>
<a href="{{ route('pinjam.index') }}">Kembali</a>

@endsection
