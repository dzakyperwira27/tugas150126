@extends('layouts.app')

@section('content')
<h1>Data Supplier</h1>

<a href="{{ route('supplier.create') }}">Tambah Supplier</a>

<table border="1" width="600">
    <tr>
        <th>Nama</th>
        <th>Kota</th>
        <th>Aksi</th>
    </tr>

    @foreach ($suppliers as $s)
    <tr>
        <td>{{ $s->nama }}</td>
        <td>{{ $s->kota }}</td>
        <td>
            <a href="{{ route('supplier.show', $s->id) }}">Detail</a> |
            <a href="{{ route('supplier.edit', $s->id) }}">Edit</a> |
            <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
