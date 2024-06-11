@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Edit Data Keluarga: {{ $keluarga->nama_kepala_keluarga }}</h3>
        </div>
    </div>
    <div class="card-body">
        @empty($keluarga)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        @else
        <form method="POST" action="{{ route('keluarga.update', $keluarga->id_keluarga) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama_kepala_keluarga" class="text-muted fw-bold">Nama Kepala Keluarga</label>
                <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga) }}">
                @error('nama_kepala_keluarga')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="no_kk" class="text-muted fw-bold">No KK</label>
                <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $keluarga->no_kk) }}">
                @error('no_kk')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="alamat" class="text-muted fw-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $keluarga->alamat) }}">
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
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
            
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary-1">Submit</button>
            </div>
        </form>
        @endempty
    </div>
</div>

@endsection

@push('css')
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background-color: #03774A;
        color: white;
        padding: 1rem;
    }

    .card-title {
        color: white;
    }

    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
        color: #03774A;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        border-color: #dae0e5;
        color: #03774A;
    }

    .btn-secondary {
        background-color: #03774A;
        border-color: #03774A;
        width: 150px;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #026a41;
        border-color: #026a41;
    }

    .btn-primary-1 {
        background-color: #03774A;
        border-color: #03774A;
        color: white;
        width: 100%;
        padding: 0.5rem 0;
        font-size: 1.1rem;
    }

    .btn-primary-1:hover {
        background-color: #026a41;
        border-color: #026a41;
    }

    .form-group label {
        font-weight: 600;
    }
    .form-group.row {
    margin-bottom: 0; /* Menghilangkan margin bawah untuk mengurangi jarak antar baris */
}

.form-group label {
    padding-top: 0.5rem; /* Menambahkan sedikit padding atas pada label agar sejajar dengan input */
}

.input-group-append {
    margin-top: 0.5rem; /* Menambahkan jarak atas untuk tombol Upload */
}

    .img-thumbnail {
        max-width: 100%;
        height: auto;
        margin-top: 0.5rem;
    }

    .text-danger {
        margin-top: 0.25rem;
    }
</style>
@endpush
