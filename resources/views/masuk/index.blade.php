@extends('layouts.app')

@section('content')
<h1>Data Barang Masuk</h1>
<a href="{{ route('masuk.create') }}">[+] Tambah Barang Masuk</a>
<hr>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Nama Barang</th>
            <th>Jumlah Masuk</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->anggota->nama }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah_masuk }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
