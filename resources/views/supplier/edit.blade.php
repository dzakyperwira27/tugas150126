@extends('layouts.app')

@section('content')
<h1>Edit Supplier</h1>

{{-- NOTIFIKASI BERHASIL --}}
@if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:10px;
        border:1px solid #c3e6cb;
    ">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
@csrf
@method('PUT')
<table width="400">
    <tr>
        <td>Nama</td>
        <td>
            <input type="text" name="nama" value="{{ old('nama', $supplier->nama) }}">
            @error('nama')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>
            <input type="text" name="kota" value="{{ old('kota', $supplier->kota) }}">
            @error('kota')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>CP</td>
        <td>
        <input type="text" name="cp" value="{{ $supplier->cp }}">
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <button type="submit">Update</button>
            <a href="{{ route('supplier.index') }}">Kembali</a>
        </td>
    </tr>
</table>
</form>
@endsection
