@extends('layouts.app')

@section('title', 'Daftar UMKM Warga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!-- Increased width from col-md-8 to col-md-10 -->
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #03774A; color: #fff;">
                    <h4 class="mb-0">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-light me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Form Pengajuan UMKM
                    </h4>
                </div>
                <div class="card-body">
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
                    <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data" id="umkmForm">
                        @csrf
                        <input type="hidden" id="nik" name="nik" value="{{ $user->nik }}">
                    
                        <div class="form-group mb-3">
                            <label for="nama_usaha">Nama Usaha</label>
                            <input type="text" id="nama_usaha" name="nama_usaha" class="form-control" required>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="jenis_usaha">Kategori</label>
                            <select id="jenis_usaha" name="jenis_usaha" class="form-control" required>
                                <option value="">Pilih Jenis Usaha</option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                                <option value="kerajinan_tangan">Kerajinan Tangan</option>
                                <option value="fashion">Fashion</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="nomer_telepon">Nomor Telepon</label>
                            <input type="tel" id="nomer_telepon" name="nomer_telepon" class="form-control" required>
                        </div>            
                    
                        <div class="form-group mb-3">
                            <label for="alamat_usaha">Alamat Usaha</label>
                            <textarea id="alamat_usaha" name="alamat_usaha" class="form-control" rows="3" required></textarea>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="harga">Harga Produk</label>
                            <input type="number" id="harga" name="harga" class="form-control" required>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi Usaha</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="foto">Foto Produk</label>
                            <input type="file" id="foto" name="foto" class="form-control-file" onchange="previewImage(this)">
                        </div>
                        <div id="imagePreview"></div>
                    
                        <div class="form-buttons mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Ajukan</button>
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
        body {
            background-color: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-header {
            background-color: #03774A;
            color: #fff;
            padding: 15px;
            border-bottom: none;
            border-radius: 4px 4px 0 0;
        }

        .card-header h4 {
            margin: 0;
        }

        .btn-light {
            color: #03774A;
            background-color: #fff;
            border-color: #03774A;
        }

        .btn-light:hover {
            color: #fff;
            background-color: #02593a;
            border-color: #02593a;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #03774A;
            box-shadow: 0 0 5px rgba(3, 119, 74, 0.5);
            outline: none;
        }

        .alert ul {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #03774A;
            border-color: #03774A;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #02593a;
            border-color: #02593a;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            width: 100%;
        }

        .btn-secondary:hover {
            background-color: #565e64;
            border-color: #565e64;
        }
    </style>
@endpush



@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var umkmForm = document.getElementById('umkmForm');

        umkmForm.addEventListener('submit', function(event) {
            var namaUsaha = document.getElementById('nama_usaha').value;
            var jenisUsaha = document.getElementById('jenis_usaha').value;
            var alamatUsaha = document.getElementById('alamat_usaha').value;
            var harga = document.getElementById('harga').value;
            var deskripsi = document.getElementById('deskripsi').value;

            if (!namaUsaha || !jenisUsaha || !alamatUsaha || !harga || !deskripsi) {
                event.preventDefault();
                alert('Semua bidang harus diisi.');
            }
        });
    });
</script>
<script>
    function previewImage(input) {
        // Memeriksa apakah file yang diunggah adalah gambar
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Menampilkan gambar yang diunggah
                document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" class="img-fluid" alt="Preview">';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
