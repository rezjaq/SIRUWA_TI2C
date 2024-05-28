@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
            </ol>
        </nav>
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <h1>{{ $page->title }}</h1>
            </div>

            <form action="{{ route('warga.Warga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama" required>
                </div>
                <div class="mb-3">
                    <label for="id_keluarga" class="form-label">Keluarga</label>
                    <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                        <option value="">Pilih Keluarga</option>
                        @foreach ($keluargas as $keluarga)
                            <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_rt" class="form-label">No RT</label>
                    <input type="text" class="form-control" id="no_rt" name="no_rt" required>
                </div>
                <div class="mb-3">
                    <label for="akte" class="form-label">Foto Akte Kelahiran</label>
                    <input type="file" class="form-control" id="akte" name="akte" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
