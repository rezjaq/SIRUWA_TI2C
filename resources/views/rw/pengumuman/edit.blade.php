@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
        <div>
            <a href="{{ route('pengumuman') }}" class="btn btn-sm btn-light me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="card-title d-inline-block text-white">Edit Pengumuman: {{ $pengumuman->judul }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @empty($pengumuman)
            <div class="alert alert-danger">
                <i class="icon fas fa-ban"></i> Data tidak ditemukan
            </div>
            <a href="{{ route('barang') }}" class="btn btn-sm btn-secondary" style="background-color: #6c757d; border-color: #6c757d;"><i class="fas fa-arrow-left"></i> Kembali</a>
            @else

            <div class="form-group">
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
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" onchange="previewFoto(event)">
                            <small class="form-text text-muted">Unggah gambar dalam format .jpg, .jpeg, atau .png</small>
                            <div class="mt-2" id="foto-image-preview">
                                <!-- Pratinjau gambar akan ditampilkan di sini -->
                            </div>
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
                            <button type="submit" class="btn btn-primary-1" style="background-color: #03774A; width: 100%;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endempty
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
        function previewFoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('foto-image');
                if (output) {
                    output.src = reader.result;
                } else {
                    var imagePreview = document.getElementById('foto-image-preview');
                    output = document.createElement('img');
                    output.id = 'foto-image';
                    output.src = reader.result;
                    output.classList.add('img-thumbnail');
                    imagePreview.appendChild(output);
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush