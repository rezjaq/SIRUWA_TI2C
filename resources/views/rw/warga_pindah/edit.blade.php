@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('WargaPindah.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-title d-inline-block text-white">Edit Warga Pindah: {{ $warga->nama }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('WargaPindah.update', $warga->id_wargaPindahMasuk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <!-- Tambahkan input fields untuk atribut warga pindah -->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $warga->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $warga->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $warga->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telepon" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                    value="{{ $warga->no_telepon }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ $warga->agama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="statusKawin" class="col-sm-2 col-form-label">Status Kawin</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="statusKawin" name="statusKawin">
                                    <option value="Kawin" {{ $warga->statusKawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Belum Kawin" {{ $warga->statusKawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Bercerai" {{ $warga->statusKawin == 'Bercerai' ? 'selected' : '' }}>Bercerai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    value="{{ $warga->pekerjaan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_rt" class="col-sm-2 col-form-label">Nomor RT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ $warga->no_rt }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_asal" class="col-sm-2 col-form-label">Alamat Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat_asal" name="alamat_asal" value="{{ $warga->alamat_asal }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_pindah" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_pindah" name="tanggal_pindah"
                                    value="{{ $warga->tanggal_pindah }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Tambahkan input fields untuk foto akte dan foto surat pindah -->
                        <div class="form-group mb-3">
                            <label class="fw-bold">Foto KTP:</label>
                            <input type="file" name="foto_ktp" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="fw-bold">Foto Surat Pindah:</label>
                            <input type="file" name="foto_surat_pindah" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
