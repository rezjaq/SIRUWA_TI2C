@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kegiatan</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                <p class="card-text">Tanggal: {{ $kegiatan->tanggal_kegiatan }}</p>
                <p class="card-text">Waktu:
                    @if ($kegiatan->waktu_selesai)
                        {{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}
                    @else
                        {{ $kegiatan->waktu_mulai }} - Selesai
                    @endif
                </p>
                <p class="card-text">Lokasi: {{ $kegiatan->lokasi_kegiatan }}</p>
                <p class="card-text">Deskripsi: {{ $kegiatan->deskripsi }}</p>
                <p class="card-text">Status: {{ $kegiatan->status_kegiatan }}</p>
                @if ($kegiatan->foto)
                    <p class="card-text">Foto:</p>
                    <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="Foto Kegiatan" class="img-fluid">
                @endif
                <!-- Tombol kembali -->
                <a href="{{ route('kegiatan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
