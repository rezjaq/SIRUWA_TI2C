''@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pengaduan ID: {{ $aduan->id_aduan }}</h3>
        <div class="card-tools">
            {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
        </div>
    </div>
    <div class="card-body">
        @empty($aduan)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('complaint.index') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('complaint.update', $aduan->id_aduan) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nik_warga" class="col-sm-2 col-form-label">NIK Warga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik_warga" name="nik_warga" value="{{ $aduan->nik_warga }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_aduan" class="col-sm-2 col-form-label">Tanggal Aduan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_aduan" name="tanggal_aduan" value="{{ $aduan->tanggal_kegiatan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isi_aduan" class="col-sm-2 col-form-label">Isi Aduan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isi_aduan" name="isi_aduan" value="{{ $aduan->isi_aduan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_aduan" class="col-sm-2 col-form-label">Status Aduan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_aduan" name="status_aduan">
                            <option value="diterima" {{ $aduan->status_aduan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="dalam proses" {{ $aduan->status_aduan == 'dalam proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="selesai" {{ $aduan->status_aduan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ $aduan->status_aduan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Tombol Kembali -->
                    <a href="{{ route('complaint.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                </div>
            </form>
        </div>
        @endempty
    </div>
</div>
@endsection

@push('styles')
    <style>
        .card-body {
            background-color: #f8f9fa; 
            padding: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .text-danger {
            color: red !important;
        }
        .text-success {
            color: green !important;
        }
    </style>
@endpush
