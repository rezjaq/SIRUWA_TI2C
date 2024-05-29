@extends('layouts.app')

@section('title', 'Data Warga Wilayah RW 02')

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
                        <a href="{{ route('warga.keluarga.index') }}" class="btn btn-sm btn-light me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Tambah Keluarga
                    </h4>
                </div>

                <div class="card-body">
                    <!-- Form tambah keluarga -->
                    <form action="{{ route('warga.keluarga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kepala_keluarga">{{ __('Nama Kepala Keluarga') }}:</label>
                            <select class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" required>
                                <option value="">{{ __('Pilih Nama Kepala Keluarga') }}</option>
                                @foreach($wargas as $warga)
                                    <option value="{{ $warga->nama }}">{{ $warga->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_kk">{{ __('Nomor KK') }}:</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">{{ __('Alamat') }}:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_rt">{{ __('Nomor RT') }}:</label>
                            <input type="text" class="form-control" id="no_rt" name="no_rt" required>
                        </div>
                        <div class="form-group">
                            <label for="kk">{{ __('Kartu Keluarga (KK)') }}:</label>
                            <input type="file" class="form-control-file" id="kk" name="kk">
                            <small class="form-text text-muted">Unggah gambar KK dalam format .jpg, .jpeg, atau .png</small>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
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
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 30px;
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

        .form-control-file {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background-color: #f8f9fa; 
            color: #03774A; 
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: calc(100% - 24px); 
        }

        .form-control-file:hover {
            border-color: #03774A;
        }

        .form-text {
            color: #6c757d;
        }

        @media (max-width: 767.98px) {
            .card-body {
                padding: 15px;
            }
        }
    </style>
@endpush
