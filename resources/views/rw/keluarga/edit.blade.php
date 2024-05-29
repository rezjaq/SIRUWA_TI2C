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
        <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('keluarga.update', $keluarga->id_keluarga) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga) }}">
                    @error('nama_kepala_keluarga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $keluarga->no_kk) }}">
                    @error('no_kk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $keluarga->alamat) }}">
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_rt">No RT</label>
                    <input type="text" name="no_rt" class="form-control" value="{{ old('no_rt', $keluarga->no_rt) }}">
                    @error('no_rt')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kk">KK</label>
                    <input type="file" name="kk" class="form-control">
                    @if ($keluarga->kk)
                        <img src="{{ asset('storage/kk_images/' . basename($keluarga->kk)) }}" alt="KK" width="100">
                    @endif
                    @error('kk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Tombol Kembali -->
                    <a href="{{ route('keluarga.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
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
