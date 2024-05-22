@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Keluarga ID: {{ $keluarga->id_keluarga }}</h3>
        <div class="card-tools">
            {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
        </div>
    </div>
    <div class="card-body">
        @empty($keluarga)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('family') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('family.update', $keluarga->id_keluarga) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nama_kepala_keluarga" class="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="{{ $keluarga->nama_kepala_keluarga }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_nik" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor_nik" name="nomor_nik" value="{{ $keluarga->nomor_nik }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $keluarga->alamat }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_rt" class="col-sm-2 col-form-label">Nomor RT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ $keluarga->no_rt }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Tombol Kembali -->
                    <a href="{{ route('family.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
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
