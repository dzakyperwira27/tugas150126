@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')

<h1>Detail Data Anggota {{ $anggota->id }}</h1>

<table>
    <tr>
        <td>NAMA</td>
        <td>: {{ $anggota->nama }}</td>
    </tr>
    <tr>
        <td>KOTA</td>
        <td>: {{ $anggota->kota }}</td>
    </tr>
    <tr>
        <td>NOMOR HP</td>
        <td>: {{ $anggota->nomor_hp }}</td>
    </tr>
    <tr>
        <td>
            <a href="{{ route('anggota.index') }}">Kembali</a>
        </td>
        <td></td>
    </tr>
</table>

@endsection
