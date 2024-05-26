@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('keluarga.index') }}">Data Keluarga</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Keluarga</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h1>Tambah Keluarga</h1>
    </div>

    <!-- Form tambah keluarga -->
    <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kepala_keluarga">Nama Kepala Keluarga:</label>
            <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" required>
        </div>
        <div class="form-group">
            <label for="no_kk">Nomor KK:</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_rt">Nomor RT:</label>
            <input type="text" class="form-control" id="no_rt" name="no_rt" required>
        </div>
        <div class="form-group">
            <label for="kk">Kartu Keluarga (KK):</label>
            <input type="file" class="form-control-file" id="kk" name="kk">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
