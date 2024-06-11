@extends('template-admin.template')

@section('content')
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">
                    <a href="{{ route('Warga.index') }}" class="btn btn-sm btn-light me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Form untuk menambahkan data warga
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <form action="{{ route('Warga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="level" name="level" required>
                                    <option value="">Pilih Level</option>
                                    <option value="RW">RW</option>
                                    <option value="RT">RT</option>
                                    <option value="Warga">Warga</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_telepon" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Opsional">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="agama" name="agama" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="statusKawin" class="col-sm-3 col-form-label">Status Kawin</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="statusKawin" name="statusKawin" required>
                                    <option value="">Pilih Status Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Bercerai">Bercerai</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Opsional">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_rt" class="col-sm-3 col-form-label">Nomor RT</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_rt" name="no_rt" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="akte" class="col-sm-3 col-form-label">Foto Akte</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="akte" name="akte" accept="image/*" onchange="previewFotoAkte(event)">
                                <small class="form-text text-muted">Unggah gambar dalam format .jpg, .jpeg, atau .png</small>
                                <div class="mt-2" id="akte-image-preview">
                                    <!-- Pratinjau gambar akan ditampilkan di sini -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ktp" class="col-sm-3 col-form-label">Foto KTP</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="ktp" name="ktp" accept="image/*" onchange="previewFotoKTP(event)">
                                <small class="form-text text-muted">Unggah gambar dalam format .jpg, .jpeg, atau .png</small>
                                <div class="mt-2" id="ktp-image-preview">
                                    <!-- Pratinjau gambar akan ditampilkan di sini -->
                                </div>
                            </div>
                        </div>                        
                        <div class="mb-3 row">
                            <label for="id_keluarga" class="col-sm-3 col-form-label">Pilih Keluarga</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                                    <option value="">Pilih Keluarga</option>
                                    @foreach ($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id_keluarga }}">{{ $keluarga->nama_kepala_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary-1" style="background-color: #03774A; width: 100%;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            background-color: #03774A;
        }

        .card-title {
            color: white;
        }

        .card-footer {
            border-radius: 0 0 15px 15px;
        }

        .btn-secondary {
            background-color: #03774A;
            border-color: #03774A;
            width: 150px;
        }

        .btn-secondary:hover {
            background-color: #026a41;
            border-color: #026a41;
        }

        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .fw-bold {
            color: #03774A;
        }

        .btn-light {
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }

        .modal-header {
            background-color: #03774A;
            color: white;
        }

        .btn-close {
            background-color: white;
        }

        .table-dark th {
            background-color: #03774A;
            color: white;
        }

        .col-lg-8 {
            max-width: 800px; /* Menentukan lebar maksimum */
            width: 100%; /* Mengisi ruang yang tersedia */
            margin: auto; /* Memposisikan form di tengah */
        }

        .btn-primary-1 {
            background-color: #03774A;
            border-color: #03774A;
            color: white;
            width: 100%;
        }
    </style>
@endpush

@push('js')
<script>
    function previewFotoAkte(event) {
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

    function previewFotoKTP(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('ktp-image');
            if (output) {
                output.src = reader.result;
            } else {
                var imagePreview = document.getElementById('ktp-image-preview');
                output = document.createElement('img');
                output.id = 'ktp-image';
                output.src = reader.result;
                output.classList.add('img-thumbnail');
                imagePreview.appendChild(output);
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush

