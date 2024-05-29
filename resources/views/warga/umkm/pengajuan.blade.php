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
    <div class="form-container">
        <h2>Pengajuan UMKM</h2>
        <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data" id="umkmForm">
            @csrf
            <input type="hidden" id="nik" name="nik" value="{{ $user->nik }}">

            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" id="nama_usaha" name="nama_usaha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_usaha">Ketegori</label>
                <select id="jenis_usaha" name="jenis_usaha" class="form-control" required>
                    <option value="">Pilih Jenis Usaha</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="kerajinan_tangan">Kerajinan Tangan</option>
                    <option value="fashion">Fashion</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="nomer_telepon">Nomor Telepon</label>
                <input type="tel" id="nomer_telepon" name="nomer_telepon" class="form-control" required>
            </div>            

            <div class="form-group">
                <label for="alamat_usaha">Alamat Usaha</label>
                <textarea id="alamat_usaha" name="alamat_usaha" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga Produk</label>
                <input type="number" id="harga" name="harga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Usaha</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="foto">Foto Produk</label>
                <input type="file" id="foto" name="foto" class="form-control-file">
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary-umkm">Ajukan</button>
                <a href="{{ route('home') }}" class="btn btn-secondary-umkm">Back to Home</a>
            </div>
        </form>
    </div>
@endsection

@push('css')
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .form-control,
        .form-control-file {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus,
        .form-control-file:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary-umkm {
            background-color: #03774A;
            color: #fff;
        }

        .btn-primary-umkm:hover {
            background-color: #02593a;
            transform: scale(1.05);
        }

        .btn-secondary-umkm {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-secondary-umkm:hover {
            background-color: #565e64;
            transform: scale(1.05);
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
@endpush
