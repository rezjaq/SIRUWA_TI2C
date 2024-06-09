@extends('layouts.app')

@section('title', 'Form Pengaduan Warga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-custom text-white">
            <h3 class="card-title">Form Pengaduan Warga</h3>
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

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Hidden input for nik_warga -->
                <input type="hidden" name="nik_warga" value="{{ $user->nik }}">
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Warga</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Anda" value="{{ $user->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Masukkan Tempat" value="{{ old('tempat') }}" required>
                    @error('tempat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal_aduan') is-invalid @enderror" id="tanggal_aduan" name="tanggal_aduan" value="{{ old('tanggal_aduan') }}" required>
                    @error('tanggal_aduan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="4" placeholder="Tuliskan Isi Pengaduan Anda" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                    <div id="imagePreview" class="mt-2"></div> <!-- Menampilkan preview gambar -->
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-buttons mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Kirim Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .bg-custom {
            background-color: #03774A !important;
        }
        .card-header {
            border-bottom: none;
        }
        .card {
            border-radius: 10px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
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
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + dataURL + '" class="img-fluid" alt="Preview">';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endpush