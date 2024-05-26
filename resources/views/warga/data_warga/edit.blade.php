@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
                {{-- Card for verification status --}}
                @if ($warga->verif == 'terverifikasi')
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Status Verifikasi</div>
                        <div class="card-body">
                            <h5 class="card-title">Data Diri Sudah Terverifikasi</h5>
                            <p class="card-text">Data diri Anda telah diverifikasi. Terimakasih telah melaengkapi data diri</p>
                        </div>
                    </div>
                @elseif($warga->verif == 'belum_terverifikasi')
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Status Verifikasi</div>
                        <div class="card-body">
                            <h5 class="card-title">Segera Lengkapi Data dan Tunggu Untuk Proses Verifikasi</h5>
                            <p class="card-text">Data diri Anda belum lengkap. Silakan lengkapi data Anda untuk
                                verifikasi.</p>
                        </div>
                    </div>
                @elseif($warga->verif == 'tidak_terverifikasi')
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Status Verifikasi</div>
                        <div class="card-body">
                            <h5 class="card-title">Data Anda Mungkin Ada yang Salah</h5>
                            <p class="card-text">Periksa kembali data Anda dan lakukan submit ulang.</p>
                        </div>
                    </div>
                @endif  
                <form action="{{ route('warga.Warga.update', $warga->nik) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ old('nik', $warga->nik) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama', $warga->nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat', $warga->alamat) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            value="{{ old('agama', $warga->agama) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_rt">No RT</label>
                        <input type="text" class="form-control" id="no_rt" name="no_rt"
                            value="{{ old('no_rt', $warga->no_rt) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_keluarga">Keluarga</label>
                        <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                            @foreach ($keluargas as $keluarga)
                                <option value="{{ $keluarga->id_keluarga }}"
                                    {{ old('id_keluarga', $warga->id_keluarga) == $keluarga->id_keluarga ? 'selected' : '' }}>
                                    {{ $keluarga->nama_kepala_keluarga }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="statusKawin">Status Kawin</label>
                        <input type="text" class="form-control" id="statusKawin" name="statusKawin"
                            value="{{ old('statusKawin', $warga->statusKawin) }}">
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ old('no_telepon', $warga->no_telepon) }}">
                    </div>

                    <div class="form-group">
                        <label for="ktp">KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">
                        @if ($warga->ktp)
                            <img src="{{ asset('storage/ktp_images/' . basename($warga->ktp)) }}" alt="KTP Image"
                                width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
