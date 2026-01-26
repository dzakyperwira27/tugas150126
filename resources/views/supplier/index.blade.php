@extends('layouts.app')

@section('title', 'Data Supplier')

@section('content')

<h1 class="mt-4 mb-4">Data Supplier</h1>

{{-- NOTIFIKASI --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-truck me-1"></i>
            Daftar Supplier
        </div>

        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Supplier
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>CP</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($suppliers as $s)
                    <tr>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->kota }}</td>
                        <td>{{ $s->cp }}</td>
                        <td>
                            <a href="{{ route('supplier.show', $s->id) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('supplier.edit', $s->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('supplier.destroy', $s->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data supplier belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
