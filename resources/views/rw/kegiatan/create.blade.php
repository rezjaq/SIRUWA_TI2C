@extends('template-admin.template')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
        <div class="card-header bg-custom text-white">
            <h4 class="mb-0">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Form untuk kegiatan desa
            </h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
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
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.bg-custom {
    background-color: #03774A !important;
}
.card-header {
    border-bottom: none;
}
.card {
    border-radius: 10px;
}
.form-label {
    font-weight: bold;
}
.form-control {
    border-radius: 5px;
}
.btn-primary {
    background-color: #03774A;
    border-color: #03774A;
    border-radius: 5px;
    width: 100%;
    color: #fff; /* Ubah warna teks menjadi putih */
    transition: background-color 0.3s ease; /* Tambahkan efek transisi */
}

.btn-primary:hover {
    background-color: #025d37;
    border-color: #025d37;
}
</style>
@endpush