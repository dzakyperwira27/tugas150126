@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')

<h1 class="mt-4 mb-4">Edit Supplier</h1>

{{-- NOTIFIKASI BERHASIL --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-edit me-1"></i>
        Form Edit Supplier
    </div>

    <div class="card-body">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text"
                       name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $supplier->nama) }}">

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kota</label>
                <input type="text"
                       name="kota"
                       class="form-control @error('kota') is-invalid @enderror"
                       value="{{ old('kota', $supplier->kota) }}">

                @error('kota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Person</label>
                <input type="text"
                       name="cp"
                       class="form-control"
                       value="{{ old('cp', $supplier->cp) }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
