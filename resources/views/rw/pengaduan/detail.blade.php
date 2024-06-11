@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
        <div>
            <a href="{{ route('admin.pengaduan') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Detail Kegiatan</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Pengadu:</label>
                    <input type="text" class="form-control" value="{{ $aduan->nama }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Tempat atau Lokasi:</label>
                    <input type="text" class="form-control" value="{{ $aduan->tempat }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Tanggal:</label>
                    <input type="text" class="form-control" value="{{ $aduan->tanggal }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Deskripsi Pengaduan:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $aduan->isi }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Bukti Foto:</label>
                    @if ($aduan->foto)
                        <img src="{{ asset('storage/' . $aduan->foto) }}" alt="Foto Aduan" class="img-fluid">
                    @else
                        <p class="text-muted">Tidak ada foto yang tersedia</p>
                    @endif
                </div>
                <form action="{{ route('pengaduan.approve', $aduan->id_aduan) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <label class="fw-bold">Komentar untuk Approve:</label>
                        <textarea name="komentar" rows="2" class="form-control" placeholder="Komentar untuk Approve" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Approve</button>
                </form>
                <form action="{{ route('pengaduan.reject', $aduan->id_aduan) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="fw-bold">Komentar untuk Reject:</label>
                        <textarea name="komentar" rows="2" class="form-control" placeholder="Komentar untuk Reject" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Reject</button>
                </form>                
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
            max-width: 100%;
            height: auto;
        }

    </style>
@endpush
