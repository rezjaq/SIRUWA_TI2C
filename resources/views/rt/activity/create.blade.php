@extends('template-admin.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tambah Kegiatan</h1>
                    <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kegiatan" lass="col-sm-2 col-form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kegiatan" lass="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_mulai" lass="col-sm-2 col-form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_selesai" lass="col-sm-2 col-form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai">
                        </div>
                        <div class="form-group">
                            <label for="lokasi_kegiatan" lass="col-sm-2 col-form-label">Lokasi Kegiatan</label>
                            <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" lass="col-sm-2 col-form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto" lass="col-sm-2 col-form-label">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon" placeholder=" ">
                                <label class="custom-file-label" for="foto"> </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_kegiatan" lass="col-sm-2 col-form-label">Status Kegiatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status_kegiatan" name="status_kegiatan" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- Tombol Kembali -->
                            <a href="{{ route('activity.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
