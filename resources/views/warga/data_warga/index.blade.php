@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
        </ol>
    </nav>
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="d-flex justify-content-between mb-3">
        <h1>{{ $page->title }}</h1>
        <!-- Tombol untuk pindah ke halaman tambah data warga -->
        <a href="{{ route('warga.Warga.create') }}" class="btn btn-primary">Tambah Data Warga</a>
        <a href="{{ route('warga.Warga.edit') }}" class="btn btn-primary">Verifikasi Data Warga</a>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nama Kepala Keluarga</th>
                <th>No RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wargas as $key => $warga)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $warga->nama }}</td>
                <td>{{ $warga->jenis_kelamin }}</td>
                <td>{{ $warga->alamat }}</td>
                <td>{{ $warga->keluarga->nama_kepala_keluarga ?? '-' }}</td>
                <td>{{ $warga->no_rt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
