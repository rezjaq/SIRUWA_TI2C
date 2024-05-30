@extends('layouts.app')

@section('title', $breadcrumb['title'])

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #03774A; color: #fff;">
                    <h4 class="mb-0">
                        <a href="{{ route('warga.Warga.index') }}" class="btn btn-sm btn-light me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Update Data Warga
                    </h4>
                </div>

                <div class="card-body">
                    {{-- Card for verification status --}}
                    @if ($warga->verif == 'terverifikasi')
                        <div class="alert alert-success" role="alert">
                            Data Diri Sudah Terverifikasi. Terimakasih telah melengkapi data diri.
                        </div>
                    @elseif($warga->verif == 'belum_terverifikasi')
                        <div class="alert alert-warning" role="alert">
                            Data Anda Menunggu Untuk Proses Verifikasi.
                        </div>
                    @elseif($warga->verif == 'tidak_terverifikasi')
                        <div class="alert alert-danger" role="alert">
                            Data Anda Belum Lengkap Atau Data Yang Anda Submit Telah Ditolak. Periksa dan lengkapi kembali data Anda dan lakukan submit.
                        </div>
                    @endif

                    <form action="{{ route('warga.Warga.update', $warga->nik) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>
                            <div class="col-md-8">
                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik', $warga->nik) }}" required autocomplete="nik" autofocus>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-8">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $warga->nama) }}" required autocomplete="nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add more form fields as needed -->
                        
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-8">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $warga->alamat) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama', $warga->agama) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="no_rt" class="col-md-4 col-form-label text-md-right">{{ __('No RT') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ old('no_rt', $warga->no_rt) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="id_keluarga" class="col-md-4 col-form-label text-md-right">{{ __('Keluarga') }}</label>
                            <div class="col-md-8">
                                <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                    @foreach ($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id_keluarga }}" {{ old('id_keluarga', $warga->id_keluarga) == $keluarga->id_keluarga ? 'selected' : '' }}>
                                            {{ $keluarga->nama_kepala_keluarga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="statusKawin" class="col-md-4 col-form-label text-md-right">{{ __('Status Kawin') }}</label>
                            <div class="col-md-8">
                                <select class="form-control" id="statusKawin" name="statusKawin">   
                                    <option value="">Pilih Status Kawin</option>
                                    <option value="Kawin" {{ old('statusKawin',$warga->statusKawin) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Belum Kawin" {{ old('statusKawin',$warga->statusKawin) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Bercerai" {{ old('statusKawin',$warga->statusKawin) == 'Bercerai' ? 'selected' : '' }}>Bercerai</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $warga->no_telepon) }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>
                            <div class="col-md-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                    <label class="custom-file-label" for="ktp">
                                        @if ($warga->ktp)
                                        <img src="{{ asset('storage/ktp_images/' . basename($warga->ktp)) }}" alt="KTP Image" width="100">
                                        @else
                                            Choose file
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <br><br>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary" style="background-color: #03774A; border: none;">Vertifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
        }

        /* Add styles to the form labels */
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        /* Add styles to the form inputs */
        .form-group input,
        .form-group select,
        .custom-file-label {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        .btn-primary {
            background-color: #03774A;
            border-color: #03774A;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #03774A;
            border-color: #03774A;
        }
    </style>
@endpush
