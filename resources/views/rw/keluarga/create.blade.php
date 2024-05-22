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
                            <label for="nama_kegiatan" lass="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kegiatan" lass="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_mulai" lass="col-sm-2 col-form-label">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_selesai" lass="col-sm-2 col-form-label">Nomor RT</label>
                            <input type="text" class="form-control" id="no_rt" name="no_rt">
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
