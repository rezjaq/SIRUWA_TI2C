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
                        <p class="card-text"><strong>No. Telepon:</strong> {{ $warga->no_telepon }}</p>
                        <p class="card-text"><strong>Agama:</strong> {{ $warga->agama }}</p>
                        <p class="card-text"><strong>Status Kawin:</strong> {{ $warga->statusKawin }}</p>
                        <p class="card-text"><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
                        <p class="card-text"><strong>No. RT:</strong> {{ $warga->no_rt }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Menampilkan foto KTP -->
                        @if($warga->ktp)
                            <div class="text-center">
                                <img src="{{ asset('storage/ktp_images/' . basename($warga->ktp)) }}" alt="Foto KTP" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                            </div>
                        @else
                            <p class="text-center">Foto KTP tidak tersedia.</p>
                        @endif
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('RTVerifikasiWarga.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
