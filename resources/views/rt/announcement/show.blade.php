@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $pengumuman->judul }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Isi Pengumuman:</strong></p>
                        <p class="card-text">{{ $pengumuman->isi }}</p>
                        <p class="card-text"><strong>Tanggal:</strong> {{ $pengumuman->tanggal }}</p>
                        <p class="card-text"><strong>Status:</strong> <span class="{{ $pengumuman->status_pengumuman == 'aktif' ? 'text-success' : 'text-danger' }}">{{ $pengumuman->status_pengumuman }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text"><strong>Foto:</strong></p>
                        @if($pengumuman->foto)
                            <img src="{{ asset('storage/'.$pengumuman->foto) }}" class="img-fluid" alt="Foto Pengumuman">
                        @else
                            <p class="text-muted">Tidak ada foto yang tersedia</p>
                        @endif
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('announcement.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
            </div>
        </div>
    </div>
@endsection
