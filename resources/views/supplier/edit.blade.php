@extends('layouts.app')

@section('content')
<h1>Edit Supplier</h1>

<form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
@csrf
@method('PUT')
<table width="400">
    <tr>
        <td>Nama</td>
        <td>
            <input type="text" name="nama" value="{{ $supplier->nama }}">
        </td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>
            <input type="text" name="kota" value="{{ $supplier->kota }}">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit">Update</button>
        </td>
    </tr>
</table>
</form>
@endsection
