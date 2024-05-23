@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Nomor Aduan : {{ $aduan->id_aduan }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>NIK:</strong> {{ $aduan->nik_warga }}</p>
                        <p class="card-text"><strong>Tanggal Aduan:</strong> {{ $aduan->tanggal_aduan }}</p>
                        <p class="card-text"><strong>Isi Aduan:</strong> {{ $aduan->isi_aduan }}</p>
                        <p class="card-text"><strong>Status Aduan:</strong> {{ $aduan->status_aduan }}</p>
                    </div>
                    <!-- <div class="col-md-6">
                        @if ($aduan->foto)
                            <p class="card-text"><strong>Foto:</strong></p>
                            <img src="{{ asset('storage/' . $aduan->foto) }}" alt="Foto aduan" class="img-fluid">
                        @else
                            <p class="text-muted">Tidak ada foto yang tersedia</p>
                        @endif
                    </div> -->
                </div>
                <!-- Tombol kembali -->
                <a href="{{ route('complaint.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
            </div>
        </div>
    </div>
@endsection
