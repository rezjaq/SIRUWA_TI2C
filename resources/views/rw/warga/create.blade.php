@extends('template-admin.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tambah Data Warga</h1>
                    <form action="{{ route('Warga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_nik" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="nomor_nik" name="nomor_nik" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_rt" class="col-sm-2 col-form-label">Nomor RT</label>
                            <input type="text" class="form-control" id="no_rt" name="no_rt">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="id_keluarga" class="col-sm-2 col-form-label">Pilih Keluarga</label>
                            <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                <option value="">Pilih Keluarga</option>
                                @foreach($keluargas as $keluarga)
                                    <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- Tombol Kembali -->
                            <a href="{{ route('Warga.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
