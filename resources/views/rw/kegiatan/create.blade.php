@extends('template-admin.template')

@section('content')
    <div class="container">
        <h1>Tambah Kegiatan</h1>
        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
            </div>
            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
            </div>
            <div class="form-group">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai">
            </div>
            <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="status_kegiatan">Status Kegiatan</label>
                <select class="form-control" id="status_kegiatan" name="status_kegiatan" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- Tombol Kembali -->
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
