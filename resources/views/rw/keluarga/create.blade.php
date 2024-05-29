@extends('template-admin.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tambah Keluarga</h1>
                    <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kepala_keluarga">{{ __('Nama Kepala Keluarga') }}:</label>
                            <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="no_kk">{{ __('Nomor KK') }}:</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">{{ __('Alamat') }}:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_rt">{{ __('Nomor RT') }}:</label>
                            <input type="text" class="form-control" id="no_rt" name="no_rt" required>
                        </div>
                        <div class="form-group">
                            <label for="kk">{{ __('Kartu Keluarga (KK)') }}:</label>
                            <input type="file" class="form-control-file" id="kk" name="kk">
                            <small class="form-text text-muted">Unggah gambar KK dalam format .jpg, .jpeg, atau .png</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- Tombol Kembali -->
                            <a href="{{ route('keluarga.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
