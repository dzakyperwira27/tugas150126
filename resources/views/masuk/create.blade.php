@extends('layouts.app')

@section('content')
<h1>Tambah Barang Masuk</h1>
<a href="{{ route('masuk.index') }}">Kembali ke Daftar</a>
<hr>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('masuk.store') }}" method="POST">
    @csrf
    <table cellpadding="8">
        <tr>
            <td>Pilih Anggota</td>
            <td>:</td>
            <td>
                <select name="anggota_id" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggotas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td>Pilih Barang</td>
            <td>:</td>
            <td>
                <select name="barang_id" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td>Jumlah Masuk</td>
            <td>:</td>
            <td>
                <input type="number" name="jumlah_masuk" min="1" required>
            </td>
        </tr>

        <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_masuk" value="{{ date('Y-m-d') }}" required>
            </td>
        </tr>

        <tr>
            <td colspan="2"></td>
            <td>
                <button type="submit">Simpan</button>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</form>
@endsection
