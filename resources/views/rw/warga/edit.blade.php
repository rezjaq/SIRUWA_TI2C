@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Warga ID: {{ $warga->nik }}</h3>
            <div class="card-tools">
                {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
            </div>
        </div>
        <div class="card-body">
            @empty($warga)
                <div class="alert alert-danger">
                    <i class="icon fas fa-ban"></i> Data tidak ditemukan
                </div>
                <a href="{{ route('warga.index') }}" class="btn btn-sm btn-secondary"
                    style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
            @else
                <div class="container mt-4">
                    <form method="POST" action="{{ route('Warga.update', $warga->nik) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $warga->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password"
                                    value="{{ $warga->password }}">
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
                                <input type="text" class="form-control" id="agama" name="agama"
                                    value="{{ $warga->agama }}">
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
                                <input type="text" class="form-control" id="no_rt" name="no_rt"
                                    value="{{ $warga->no_rt }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="level" name="level"
                                    value="{{ $warga->level }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_keluarga">Keluarga</label>
                            <select name="id_keluarga" id_keluarga="id_keluarga" class="form-control">
                                @foreach($keluargas as $keluarga)
                                    <option value="{{ $keluarga->id_keluarga }}" {{ $warga->id_keluarga == $keluarga->id_keluarga ? 'selected' : '' }}>
                                        {{ $keluarga->nama_kepala_keluarga }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Input untuk status -->
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status" name="status">
                                    <option value="disetujui" {{ $warga->status == 'disetujui' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="tidak_disetujui"
                                        {{ $warga->status == 'tidak_disetujui' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <!-- Input untuk verifikasi -->
                        <div class="form-group row">
                            <label for="verif" class="col-sm-2 col-form-label">Verifikasi</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="verif" name="verif">
                                    <option value="terverifikasi" {{ $warga->verif == 'terverifikasi' ? 'selected' : '' }}>
                                        Terverifikasi</option>
                                    <option value="belum_terverifikasi"
                                        {{ $warga->verif == 'belum_terverifikasi' ? 'selected' : '' }}>Belum Terverifikasi
                                    </option>
                                    <option value="tidak_terverifikasi"
                                        {{ $warga->verif == 'tidak_terverifikasi' ? 'selected' : '' }}>Tidak Terverifikasi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akte" class="col-sm-2 col-form-label">Akte</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="akte" name="akte">
                                @if ($warga->akte)
                                <img src="{{ asset('storage/akte/' . basename($warga->akte)) }}" alt="Foto Akte" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ktp" class="col-sm-2 col-form-label">KTP</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="ktp" name="ktp">
                                @if ($warga->ktp)
                                <img src="{{ asset('storage/ktp_images/' . basename($warga->ktp)) }}" alt="Foto KTP" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- Tombol Kembali -->
                            <a href="{{ route('Warga.index') }}" class="btn btn-secondary"
                                style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                        </div>
                    </form>
                </div>
            @endempty
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .text-danger {
            color: red !important;
        }

        .text-success {
            color: green !important;
        }
    </style>
@endpush
