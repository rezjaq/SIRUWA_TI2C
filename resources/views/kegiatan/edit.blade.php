@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kegiatan</h1>
        <form action="{{ route('kegiatan.update', $kegiatan->id_kegiatan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Kegiatan -->
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
            </div>

            <!-- Tanggal Kegiatan -->
            <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ $kegiatan->tanggal_kegiatan }}">
            </div>

            <!-- Waktu Mulai -->
            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ $kegiatan->waktu_mulai }}">
            </div>

            <!-- Waktu Selesai -->
            <div class="form-group">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ $kegiatan->waktu_selesai }}">
            </div>

            <!-- Lokasi Kegiatan -->
            <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="{{ $kegiatan->lokasi_kegiatan }}">
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $kegiatan->deskripsi }}</textarea>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <!-- Status Kegiatan -->
            <div class="form-group">
                <label for="status_kegiatan">Status Kegiatan</label>
                <select class="form-control" id="status_kegiatan" name="status_kegiatan">
                    <option value="aktif" {{ $kegiatan->status_kegiatan == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ $kegiatan->status_kegiatan == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
