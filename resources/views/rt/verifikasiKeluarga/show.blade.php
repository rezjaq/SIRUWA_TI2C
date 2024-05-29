@extends('template-admin.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
        <h3 class="card-title">Detail Data Keluarga</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>ID Keluarga:</label>
                    <input type="text" class="form-control" value="{{ $keluarga->id_keluarga }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Kepala Keluarga:</label>
                    <input type="text" class="form-control" value="{{ $keluarga->nama_kepala_keluarga }}" readonly>
                </div>
                <div class="form-group">
                    <label>No KK:</label>
                    <input type="text" class="form-control" value="{{ $keluarga->no_kk }}" readonly>
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <input type="text" class="form-control" value="{{ $keluarga->status }}" readonly>
                </div>
                <div class="form-group">
                    <label>Verifikasi:</label>
                    <input type="text" class="form-control" value="{{ $keluarga->verif }}" readonly>
                </div>
                <div class="form-group">
                    <label>Gambar KK:</label>
                    @if($keluarga->kk)
                        <img src="{{ asset('storage/' . $keluarga->kk) }}" class="img-fluid" alt="Gambar KK">
                    @else
                        <span>Tidak ada gambar KK.</span>
                    @endif
                </div>
                <a href="{{ route('RTVerifikasiKeluarga.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
