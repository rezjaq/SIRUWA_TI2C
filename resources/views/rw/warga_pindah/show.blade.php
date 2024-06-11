@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('WargaPindah.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-title d-inline-block text-white">Detail Warga Pindahan: {{ $warga->nama }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="fw-bold">NIK:</label>
                        <input type="text" class="form-control" value="{{ $warga->nik }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Nama:</label>
                        <input type="text" class="form-control" value="{{ $warga->nama }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Jenis Kelamin:</label>
                        <input type="text" class="form-control" value="{{ $warga->jenis_kelamin }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Tanggal Lahir:</label>
                        <input type="text" class="form-control" value="{{ $warga->tanggal_lahir }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Alamat:</label>
                        <input type="text" class="form-control" value="{{ $warga->alamat }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">No. Telepon:</label>
                        <input type="text" class="form-control" value="{{ $warga->no_telepon }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Agama:</label>
                        <input type="text" class="form-control" value="{{ $warga->agama }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Status Kawin:</label>
                        <input type="text" class="form-control" value="{{ $warga->statusKawin }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Pekerjaan:</label>
                        <input type="text" class="form-control" value="{{ $warga->pekerjaan }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">No. RT:</label>
                        <input type="text" class="form-control" value="{{ $warga->no_rt }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Alamat Asal:</label>
                        <input type="text" class="form-control" value="{{ $warga->alamat_asal}}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Tanggal Pindah:</label>
                        <input type="text" class="form-control" value="{{ $warga->tanggal_pindah }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="fw-bold">Foto Akte:</label>
                        @if($warga->foto_ktp)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . basename($warga->foto_ktp)) }}" alt="Foto KTP" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                            </div>
                        @else
                            <p class="text-center">Foto KTP tidak tersedia.</p>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Foto Surat Pindah:</label>
                        @if($warga->foto_surat_pindah)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . basename($warga->foto_surat_pindah)) }}" alt="Foto Surat Pindah" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                            </div>
                        @else
                            <p class="text-center">Foto Surat Pindah tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /* Custom CSS */
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
