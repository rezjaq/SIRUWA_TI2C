@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('pengumuman') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-title d-inline-block text-white">Detail Pengumuman: {{ $pengumuman->judul }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <div class="form-group mb-3">
                        <label class="fw-bold">Nama Pengumuman:</label>
                        <input type="text" class="form-control" value="{{ $pengumuman->judul }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Isi Pengumuman:</label>
                        <input type="text" class="form-control" value="{{ $pengumuman->isi }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Tanggal Pengumuman:</label>
                        <input type="text" class="form-control" value="{{ $pengumuman->tanggal }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">status Pengumuman:</label>
                        <input type="text" class="form-control" value="{{ $pengumuman->status_pengumuman }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Foto Pengumuman:</label>
                        @if($pengumuman->foto)
                            <img src="{{ asset('storage/'.$pengumuman->foto) }}" class="img-fluid" alt="Foto Pengumuman">
                        @else
                            <p class="text-muted">Tidak ada foto yang tersedia</p>
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