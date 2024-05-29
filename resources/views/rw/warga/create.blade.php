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
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-2 col-form-label">Level</label>
                                <select class="form-control" id="level" name="level" required>
                                    <option value="">Pilih Level</option>
                                    <option value="RW">RW</option>
                                    <option value="RT">RT</option>
                                    <option value="Warga">Warga</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon" class="col-sm-2 col-form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Opsional">
                            </div>
                            <div class="form-group">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" required>
                            </div>
                            <div class="form-group">
                                <label for="statusKawin" class="col-sm-2 col-form-label">Status Kawin</label>
                                <select class="form-control" id="statusKawin" name="statusKawin" required>
                                    <option value="">Pilih Status Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Bercerai">Bercerai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Opsional">
                            </div>
                            <div class="form-group">
                                <label for="no_rt" class="col-sm-2 col-form-label">Nomor RT</label>
                                <input type="text" class="form-control" id="no_rt" name="no_rt" required>
                            </div>
                            <!-- Sisipkan input untuk foto KK -->
                            <div class="form-group">
                                <label for="akte" class="col-sm-2 col-form-label">Foto akte</label>
                                <input type="file" class="form-control-file" id="akte" name="akte"
                                    accept="image/*">
                            </div>
                            <!-- Sisipkan input untuk foto KTP -->
                            <div class="form-group">
                                <label for="ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                                <input type="file" class="form-control-file" id="ktp" name="ktp"
                                    accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="id_keluarga" class="col-sm-2 col-form-label">Pilih Keluarga</label>
                                <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                    <option value="">Pilih Keluarga</option>
                                    @foreach ($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- Tombol Kembali -->
                                <a href="{{ route('Warga.index') }}" class="btn btn-secondary"
                                    style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
