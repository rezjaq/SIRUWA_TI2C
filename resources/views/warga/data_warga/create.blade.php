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
                <div class="card">
                    <div class="card-header" style="background-color: #03774A; color: #fff;">
                        <h4 class="mb-0">
                            <a href="{{ route('warga.Warga.index') }}" class="btn btn-sm btn-light me-2">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            Tambah Data Warga
                        </h4>
                    </div>
                    
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
                            <div class="form-group mb-3">
                                <label for="nik" class="col-form-label">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat" class="col-form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="agama" class="col-form-label">Agama:</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_keluarga" class="col-form-label">Pilih Keluarga:</label>
                                <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                    <option value="">Pilih Keluarga</option>
                                    @foreach($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_rt" class="col-form-label">Nomor RT:</label>
                                <input type="text" class="form-control" id="no_rt" name="no_rt" value="{{ old('no_rt') }}">
                            </div>
                            <div class="form-group">
                                <label for="akte">{{ __('Akte Kelahiran') }}:</label>
                                <input type="file" class="form-control-file" id="akte" name="akte" accept="image/*" onchange="previewAkteImage(event)">
                                <small class="form-text text-muted">Unggah gambar Akte dalam format .jpg, .jpeg, atau .png</small>
                                <div class="mt-2" id="akte-image-preview">
                                    <!-- Image preview will be inserted here -->
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Simpan') }}</button>
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
        .form-group textarea {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        .form-group.mb-3 {
            margin-bottom: 1rem;
        }

        /* Styling for error messages */
        .alert ul {
            margin-bottom: 0;
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
        #akte-image {
            max-width: 780px;
            height: auto;
        }

        @media (max-width: 767px) {
            #akte-image {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
@endpush
@push('js')
    <script>
        function previewAkteImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('akte-image');
                if (output) {
                    output.src = reader.result;
                } else {
                    var imagePreview = document.getElementById('akte-image-preview');
                    output = document.createElement('img');
                    output.id = 'akte-image';
                    output.src = reader.result;
                    output.classList.add('img-thumbnail');
                    imagePreview.appendChild(output);
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
