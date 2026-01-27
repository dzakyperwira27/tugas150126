@extends('layouts.app')

@section('content')
<h1>Edit Peminjaman Barang</h1>
<a href="{{ route('pinjam.index') }}">Kembali ke Daftar</a>
<hr>

@if ($errors->any())
<div style="color:red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('pinjam.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <table cellpadding="8">
        <tr>
            <td>Anggota</td>
            <td>:</td>
            <td>
                <select name="anggota_id">
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}"
                            {{ $item->anggota_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td>Barang</td>
            <td>:</td>
            <td>
                <select name="barang_id">
                    @foreach($barangs as $p)
                        <option value="{{ $p->id }}"
                            {{ $item->barang_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td>Jumlah Pinjam</td>
            <td>:</td>
            <td>
                <input type="number" name="jumlah_pinjam"
                       value="{{ $item->jumlah_pinjam }}" min="1">
            </td>
        </tr>

        <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_pinjam"
                       value="{{ $item->tanggal_pinjam }}">
            </td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>
                <textarea name="keterangan" rows="3">{{ $item->keterangan }}</textarea>
            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>

@endsection
