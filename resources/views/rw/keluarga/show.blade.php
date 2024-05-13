@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kepala Keluarga : {{ $keluarga->nama_kepala_keluarga }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Nomor NIK:</strong> {{ $keluarga->nomor_nik }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $keluarga->alamat }}</p>
                        <p class="card-text"><strong>No. RT:</strong> {{ $keluarga->no_rt }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Tambahkan bagian lain yang ingin ditampilkan di sini -->
                    </div>
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('keluarga.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
            </div>
        </div>
    </div>
@endsection
