@extends('template-admin.template')

@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">
                    <a href="{{ route('rw.surat.index') }}" class="btn btn-sm btn-light me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Tambah Formulir Surat
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <form method="POST" action="{{ route('rw.surat.storeForm') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Nama File</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file_path" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="file_path" name="file_path" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
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
            border-radius: 5px;
            width: 100%;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #025d37;
            border-color: #025d37;
        }
    </style>
@endpush
