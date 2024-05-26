@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Warga</div>
                    
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('warga.Warga.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nik">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama:</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama') }}">
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
                                <label for="no_rt">Nomor RT:</label>
                                <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ old('no_rt') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
