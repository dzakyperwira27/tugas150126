@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<h2>Data Anggota</h2>

{{-- NOTIFIKASI --}}
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


<table>
    <tr>
        <th>Nama</th>
        <th>Kota</th>
        <th>Nomor HP</th>
        <th>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">
                + Tambah Anggota Baru
            </a>
        </th>
    </tr>

    @forelse ($anggotas as $anggota)
        <tr>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->kota }}</td>
            <td>{{ $anggota->nomor_hp }}</td>
            <td>
                <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('anggota.show', $anggota->id) }}" class="btn btn-primary">
                    Detail
                </a>

                <form action="{{ route('anggota.destroy', $anggota->id) }}"
                      method="POST"
                      style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" align="center">
                Data tidak tersedia
            </td>
        </tr>
    @endforelse
</table>

@endsection
