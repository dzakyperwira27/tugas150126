@extends('layouts.app')

@section('content')
<h1>Tambah Supplier</h1>

<form action="{{ route('supplier.store') }}" method="POST">
@csrf
<table width="400">
    <tr>
        <td>Nama</td>
        <td>
            <input type="text" name="nama">
            @error('nama')
            <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>
            <input type="text" name="kota">
            @error('kota')
            <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit">Simpan</button>
        </td>
    </tr>
</table>
</form>
@endsection
