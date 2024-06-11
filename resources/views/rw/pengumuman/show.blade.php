@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A; color: #fff;">
        <div>
            <a href="{{ route('pengumuman') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Detail Pengumuman: {{ $pengumuman->judul }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Pengumuman:</label>
                    <input type="text" class="form-control" value="{{ $pengumuman->judul }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Isi Pengumuman:</label>
                    <textarea class="form-control" rows="5" readonly>{{ $pengumuman->isi }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Tanggal Pengumuman:</label>
                    <input type="text" class="form-control" value="{{ $pengumuman->tanggal }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Status Pengumuman:</label>
                    <input type="text" class="form-control" value="{{ $pengumuman->status_pengumuman }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Foto Pengumuman:</label>
                    @if($pengumuman->foto)
                        <a href="#" data-toggle="modal" data-target="#photoModal">
                            <img src="{{ asset('storage/'.$pengumuman->foto) }}" class="img-fluid" alt="Foto Pengumuman">
                        </a>
                    @else
                        <p class="text-muted">Tidak ada foto yang tersedia</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Photo -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03774A; color: white;">
                <h5 class="modal-title" id="photoModalLabel">Foto Pengumuman</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/'.$pengumuman->foto) }}" class="img-fluid" alt="Foto Pengumuman">
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
        margin-top: 20px;
    }

    .card-header {
        border-radius: 15px 15px 0 0;
        background-color: #03774A;
    }

    .card-title {
        color: white;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px;
    }

    .btn {
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        border-color: #dae0e5;
    }

    .fw-bold {
        color: #03774A;
    }

    .img-fluid {
        cursor: pointer;
        transition: transform 0.2s;
    }

    .img-fluid:hover {
        transform: scale(1.05);
    }

    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        background-color: #03774A;
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .modal-body img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .btn-close {
        color: white;
        opacity: 1;
    }

    .btn-close:hover {
        color: black;
    }
</style>
@endpush
