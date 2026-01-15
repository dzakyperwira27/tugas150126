@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')

<h2>Data Barang</h2>

{{-- NOTIFIKASI SUKSES --}}
@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- NOTIFIKASI ERROR --}}
@if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table>
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>
            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                + Tambah Barang Baru
            </a>
        </th>
    </tr>

    @forelse ($barangs as $barang)
        <tr>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->deskripsi }}</td>
            <td>{{ $barang->harga }}</td>
            <td>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary">
                    Detail
                </a>

                <form action="{{ route('barang.destroy', $barang->id) }}"
                      method="POST"
                      style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" align="center">
                Data tidak tersedia
            </td>
        </tr>
    @endforelse
</table>

@endsection
