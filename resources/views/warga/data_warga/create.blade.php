@extends('layouts.app')

@section('title', $breadcrumb['title'])

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection


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
                        <form method="POST" action="{{ route('warga.Warga.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nik" class="col-form-label">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat" class="col-form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="agama" class="col-form-label">Agama:</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_keluarga" class="col-form-label">Pilih Keluarga:</label>
                                <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                    <option value="">Pilih Keluarga</option>
                                    @foreach($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_rt" class="col-form-label">Nomor RT:</label>
                                <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ old('no_rt') }}">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-100" >
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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

@push('css')
    <style>
        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
        }

        /* Add styles to the form labels */
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        /* Add styles to the form inputs */
        .form-group input,
        .form-group select,
        .form-group textarea {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        .form-group.mb-3 {
            margin-bottom: 1rem;
        }

        /* Styling for error messages */
        .alert ul {
            margin-bottom: 0;
        }
    </style>
@endpush
