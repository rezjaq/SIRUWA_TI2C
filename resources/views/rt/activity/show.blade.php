@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $kegiatan->nama_kegiatan }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Tanggal:</strong> {{ $kegiatan->tanggal_kegiatan }}</p>
                        <p class="card-text"><strong>Waktu:</strong>
                            @if ($kegiatan->waktu_selesai)
                                {{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}
                            @else
                                {{ $kegiatan->waktu_mulai }} - Selesai
                            @endif
                        </p>
                        <p class="card-text"><strong>Lokasi:</strong> {{ $kegiatan->lokasi_kegiatan }}</p>
                        <p class="card-text"><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $kegiatan->status_kegiatan }}</p>
                    </div>
                    <div class="col-md-6">
                        @if ($kegiatan->foto)
                            <p class="card-text"><strong>Foto:</strong></p>
                            <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="Foto Kegiatan" class="img-fluid">
                        @else
                            <p class="text-muted">Tidak ada foto yang tersedia</p>
                        @endif
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('activity.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
            </div>
        </div>
    </div>
@endsection
