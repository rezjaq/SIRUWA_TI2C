@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
        <div>
            <a href="{{ route('admin.pengaduan') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Detail Pengajuan UMKM </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Pengajuan:</label>
                    <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Usaha:</label>
                    <input type="text" class="form-control" value="{{ $usahaWarga->nama_usaha }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Jenis Usaha:</label>
                    <input type="text" class="form-control" value="{{ $usahaWarga->jenis_usaha }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Nomer Telepon:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $usahaWarga->nomer_telepon }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Harga Jual:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $usahaWarga->harga }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $usahaWarga->deskripsi }}</textarea>
                </div>
                <div class="d-flex">
                    <form action="{{ route('umkm.approve', $usahaWarga->id_usahaWarga) }}" method="POST" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('umkm.reject', $usahaWarga->id_usahaWarga) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="fw-bold">Foto UMKM:</label>
                    @if ($usahaWarga->foto)
                        <a href="{{ asset('storage/' . $usahaWarga->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $usahaWarga->foto) }}" alt="Foto UMKM" class="img-fluid">
                        </a>
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

        .form-control {
            border-radius: 10px;
        }

        .btn {
            border-radius: 10px;
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
            max-width: 400px;
            height: auto;
        }
        
        .d-flex .btn {
            margin-top: 10px;
        }

        .me-2 {
            margin-right: 10px;
        }
    </style>
@endpush
