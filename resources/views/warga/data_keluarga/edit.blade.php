@extends('layouts.app')

@section('title', 'Data Kepala Keluarga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header" style="background-color: #03774A; color: #fff;">
            <h4 class="mb-0">
                <a href="{{ route('warga.keluarga.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Update Data Kepala Keluarga
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('warga.keluarga.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kepala_keluarga" class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" value="{{ old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga) }}">
                    @error('nama_kepala_keluarga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_kk" class="form-label">No KK</label>
                    <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk', $keluarga->no_kk) }}">
                    @error('no_kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $keluarga->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_rt" class="form-label">No RT</label>
                    <input type="text" name="no_rt" class="form-control @error('no_rt') is-invalid @enderror" value="{{ old('no_rt', $keluarga->no_rt) }}">
                    @error('no_rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kk" class="form-label">KK</label>
                    <input type="file" name="kk" class="form-control @error('kk') is-invalid @enderror">
                    @if ($keluarga->kk)
                        <img src="{{ Storage::url($keluarga->kk) }}" alt="KK" width="100" class="mt-2">
                    @endif
                    @error('kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #03774A; border: none;">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .card {
        border-radius: 10px;
        border: none;
    }

    .card-header {
        border-radius: 10px 10px 0 0;
    }

    .form-control {
        border-radius: 5px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
            background-color: #03774A;
            border-color: #03774A;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #03774A;
            border-color: #03774A;
        }

    .invalid-feedback {
        font-size: 0.875em;
    }
</style>
@endpush
