@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Warga</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>NIK:</strong> {{ $warga->nik }}</p>
                        <p class="card-text"><strong>Nama:</strong> {{ $warga->nama }}</p>
                        <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
                        <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $warga->tanggal_lahir }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $warga->alamat }}</p>
                        <p class="card-text"><strong>Agama:</strong> {{ $warga->agama }}</p>
                        <p class="card-text"><strong>No. RT:</strong> {{ $warga->no_rt }}</p>
                        <p class="card-text"><strong>Nama Kepala Keluarga:</strong> {{ $warga->keluarga->nama_kepala_keluarga ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Menampilkan foto Akte -->
                        @if($warga->akte)
                            <div class="text-center">
                                <img src="{{ asset('storage/akte/' .  basename($warga->akte)) }}" alt="Foto Akte Kelahiran" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                            </div>
                        @else
                            <p class="text-center">Foto Akte Kelahiran tidak tersedia.</p>
                        @endif
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
