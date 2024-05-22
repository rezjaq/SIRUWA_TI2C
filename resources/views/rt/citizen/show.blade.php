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
                        <!-- Tambahkan bagian lain yang ingin ditampilkan di sini -->
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('citizen.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
