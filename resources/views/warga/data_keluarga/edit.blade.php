@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Keluarga</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('warga.keluarga.update') }}" method="POST" enctype="multipart/form-data">
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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
