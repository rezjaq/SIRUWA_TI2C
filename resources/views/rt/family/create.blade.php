@extends('template-admin.template')

@section('content')
<div class="container">
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

    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header bg-custom text-white">
                    <h4 class="mb-0">
                        <a href="{{ route('family.index') }}" class="btn btn-sm btn-light me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Form untuk menambahkan data keluarga
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('family.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-3 row">
                            <label for="nama_kepala_keluarga" class="col-form-label col-md-3">Nama Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" id="nama_kepala_keluarga" name="nama_kepala_keluarga" placeholder="Masukkan Nama Kepala Keluarga" value="{{ old('nama_kepala_keluarga') }}" required>
                                @error('nama_kepala_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_kk" class="col-form-label col-md-3">Nomor KK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" placeholder="Masukkan Nomor KK" value="{{ old('no_kk') }}" required>
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-form-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_rt" class="col-form-label col-md-3">Nomor RT</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('no_rt') is-invalid @enderror" id="no_rt" name="no_rt" placeholder="Masukkan Nomor RT" value="{{ old('no_rt') }}" required>
                                @error('no_rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kk" class="col-form-label col-md-3">Kartu Keluarga (KK)</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file @error('kk') is-invalid @enderror" id="kk" name="kk" accept=".jpg,.jpeg,.png">
                                <small class="form-text text-muted">Unggah gambar KK dalam format .jpg, .jpeg, atau .png</small>
                                @error('kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
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
