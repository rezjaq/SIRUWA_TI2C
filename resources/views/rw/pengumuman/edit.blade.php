@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pengumuman ID: {{$pengumuman->id_pengumuman}}</h3>
        <div class="card-tools">
            {{-- Tambahkan tombol-tombol aksi di sini jika diperlukan --}}
        </div>
    </div>
    <div class="card-body">
        @empty($pengumuman)
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Data tidak ditemukan
        </div>
        <a href="{{ route('barang') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
        @else
        <div class="container mt-4">
            <form method="POST" action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $pengumuman->judul }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isi" class="col-sm-2 col-form-label">Isi Pengumuman</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ $pengumuman->isi }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pengumuman->tanggal }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_pengumuman" class="col-sm-2 col-form-label">Status Pengumuman</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_pengumuman" name="status_pengumuman" onchange="changeTextColor()" required>
                            <option value="aktif" {{ $pengumuman->status_pengumuman == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak aktif" {{ $pengumuman->status_pengumuman == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('pengumuman') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                    </div>
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

@push('scripts')
    <script>
        function changeTextColor() {
            var selectBox = document.getElementById("status_pengumuman");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var statusText = document.getElementById("status_text");
            if (selectedValue === "aktif") {
                statusText.className = "text-success";
            } else {
                statusText.className = "text-danger";
            }
        }
    </script>
@endpush
