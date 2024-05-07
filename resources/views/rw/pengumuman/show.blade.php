@extends('template-admin.template')

@section('content')
    <div class="container">
        <h1>Detail Pengumuman</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                <p class="card-text">{{ $pengumuman->isi }}</p>
                <p class="card-text">Tanggal: {{ $pengumuman->tanggal }}</p>
                <p class="card-text">Status: {{ $pengumuman->status_pengumuman }}</p>
                <!-- Menampilkan informasi lainnya -->
                <p class="card-text">Foto: <img src="{{ asset('storage/'.$pengumuman->foto) }}" alt="Foto Pengumuman"></p>
                <!-- Tambahan informasi lainnya sesuai kebutuhan -->

                <!-- Tombol kembali -->
                <a href="{{ route('pengumuman') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
