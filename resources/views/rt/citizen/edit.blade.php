@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Warga ID: {{ $warga->nik }}</h3>
        <div class="card-tools">
            {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
        </div>
    </div>
    <div class="card-body">
        @empty($warga)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('citizen.index') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('Warga.update', $warga->nik) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $warga->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $warga->alamat }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telepon" class="col-sm-2 col-form-label">No. Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $warga->no_telepon }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="agama" name="agama" value="{{ $warga->agama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="statusKawin" class="col-sm-2 col-form-label">Status Kawin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="statusKawin" name="statusKawin" value="{{ $warga->statusKawin }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $warga->pekerjaan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_rt" class="col-sm-2 col-form-label">Nomor RT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ $warga->no_rt }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="level" name="level" value="{{ $warga->level }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Tombol Kembali -->
                    <a href="{{ route('citizen.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
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
