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
                <a href="{{ route('pengumuman') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Form untuk pengumuman desa
            </h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                    <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-sm-2 col-form-label">Isi Pengumuman</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_pengumuman" class="col-sm-2 col-form-label">Status Pengumuman</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status_pengumuman" name="status_pengumuman" required>
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