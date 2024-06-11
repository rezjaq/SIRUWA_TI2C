@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
        <div>
            <a href="{{ route('family.index') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Edit Data Keluarga: {{ $keluarga->nama_kepala_keluarga }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @empty($keluarga)
            <div class="alert alert-danger">
                <i class="icon fas fa-ban"></i> Data tidak ditemukan
            </div>
            <a href="{{ route('family.index') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
            @else
            <div class="form-group">
                <form method="POST" action="{{ route('family.update', $keluarga->id_keluarga) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nama_kepala_keluarga" class="text-muted fw-bold">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga) }}">
                        @error('nama_kepala_keluarga')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">
                        <label for="no_kk" class="text-muted fw-bold">No KK</label>
                        <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $keluarga->no_kk) }}">
                        @error('no_kk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">
                        <label for="alamat" class="text-muted fw-bold">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $keluarga->alamat) }}">
                        @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">
                        <label for="no_rt" class="text-muted fw-bold">No RT</label>
                        <input type="text" name="no_rt" class="form-control" value="{{ old('no_rt', $keluarga->no_rt) }}">
                        @error('no_rt')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3"> <!-- Tambahkan class row di sini -->
                        <label for="kk" class="col-sm-2 col-form-label text-muted fw-bold">Kartu Keluarga: </label>
                        <div class="col-sm-6">
                            <div class="input-group"> <!-- Tambahkan div input-group di sini -->
                                <input type="file" class="form-control-file" id="kk" name="kk">
        
                            </div>
                            @if ($keluarga->kk)
                            <img src="{{ asset('storage/kk_images/' . basename($keluarga->kk)) }}" alt="Foto KK" class="img-fluid img-thumbnail mt-2">
                            @endif
                            @error('kk')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  mb-3">
                        <button type="submit" class="btn btn-primary-1" style="background-color: #03774A; width: 100%;">Submit</button>
                    </div>
                </form>
            </div>
            @endempty
        </div>
    </div>
</div>

@endsection

@push('css')
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
    .btn-primary-1 {
        background-color: #03774A;
        border-color: #03774A;
        color: white;
        width: 100%;
    }
</style>
@endpush
