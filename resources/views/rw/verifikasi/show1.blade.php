@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between" style="border-radius: 15px 15px 0 0; background-color: #03774A;">
        <div>
            <a href="{{ route('verifikasi.index') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Detail Verifikasi Warga: {{ $warga->nik }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                <div class="form-group mb-3">
                    <label for="nik" class="text-muted">NIK</label>
                    <input type="text" class="form-control" value="{{ $warga->nik }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="nama" class="text-muted">Nama</label>
                    <input type="text" class="form-control" value="{{ $warga->nama }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kelamin" class="text-muted">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ $warga->jenis_kelamin }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_lahir" class="text-muted">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="{{ $warga->tanggal_lahir }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat" class="text-muted">Alamat</label>
                    <input type="text" class="form-control" value="{{ $warga->alamat }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="nik">Agama</label>
                    <input type="text" class="form-control" value="{{ $warga->agama }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="nik">No RT</label>
                    <input type="text" class="form-control" value="{{ $warga->no_rt }}" readonly>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="fw-bold">Foto AKTE:</label>
                @if($warga->akte)
                    <div class="text-center">
                        <img src="{{ asset('storage/akte/' .  basename($warga->akte)) }}" alt="Foto Akte Kelahiran" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                    </div>
                @else
                    <p class="text-center">Foto Akte Kelahiran tidak tersedia.</p>
                @endif
            </div>            
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    <style>
        .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 15px 15px 0 0;
        background-color: #03774A;
    }

    .card-title {
        color: white;
    }

    .card-footer {
        border-radius: 0 0 15px 15px;
    }

    .btn-secondary {
        background-color: #03774A;
        border-color: #03774A;
        width: 150px;
    }

    .btn-secondary:hover {
        background-color: #026a41;
        border-color: #026a41;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }

    .fw-bold {
        color: #03774A;
    }

    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        border-color: #dae0e5;
    }

    .modal-header {
        background-color: #03774A;
        color: white;
    }

    .btn-close {
        background-color: white;
    }

    .table-dark th {
        background-color: #03774A;
        color: white;
    }
</style>
@endpush
