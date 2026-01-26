@extends('layouts.app')

@section('title', 'Detail Supplier')

@section('content')

<h1 class="mt-4 mb-4">Detail Supplier</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-truck me-1"></i>
        Informasi Supplier
    </div>

    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="150">Nama</th>
                <td>: {{ $supplier->nama }}</td>
            </tr>
            <tr>
                <th>Kota</th>
                <td>: {{ $supplier->kota }}</td>
            </tr>
            <tr>
                <th>Contact Person</th>
                <td>: {{ $supplier->cp }}</td>
            </tr>
        </table>

        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

@endsection
