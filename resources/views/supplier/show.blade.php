@extends('layouts.app')

@section('content')
<h1>Detail Supplier</h1>

<table width="400">
    <tr>
        <td>Nama</td>
        <td>: {{ $supplier->nama }}</td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>: {{ $supplier->kota }}</td>
    </tr>
</table>

<a href="{{ route('supplier.index') }}">Kembali</a>
@endsection
