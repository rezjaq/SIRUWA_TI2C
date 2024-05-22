@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kegiatan ID: {{ $kegiatan->id_kegiatan }}</h3>
        <div class="card-tools">
            {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
        </div>
    </div>
    <div class="card-body">
        @empty($kegiatan)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('activity.index') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id_kegiatan) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_kegiatan" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ $kegiatan->tanggal_kegiatan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ $kegiatan->waktu_mulai }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu_selesai" class="col-sm-2 col-form-label">Waktu Selesai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ $kegiatan->waktu_selesai }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi_kegiatan" class="col-sm-2 col-form-label">Lokasi Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="{{ $kegiatan->lokasi_kegiatan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $kegiatan->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_kegiatan" class="col-sm-2 col-form-label">Status Kegiatan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_kegiatan" name="status_kegiatan">
                            <option value="aktif" {{ $kegiatan->status_kegiatan == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak aktif" {{ $kegiatan->status_kegiatan == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Tombol Kembali -->
                    <a href="{{ route('activity.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
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
