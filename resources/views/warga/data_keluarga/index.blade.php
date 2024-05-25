@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $page->title }}</h1>
    <!-- Tombol untuk pindah ke halaman tambah data keluarga -->
    <a href="{{ route('warga.keluarga.create') }}" class="btn btn-primary mb-3">Tambah Data Keluarga</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kepala Keluarga</th>
                <th>Alamat</th>
                <th>No RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluargas as $key => $keluarga)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $keluarga->nama_kepala_keluarga }}</td>
                <td>{{ $keluarga->alamat }}</td>
                <td>{{ $keluarga->no_rt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
