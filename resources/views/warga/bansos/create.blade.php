@extends('layouts.app')

@section('title', $breadcrumb['title'])

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list'],
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
                            <a href="{{ route('dashboard-warga') }}" class="btn btn-sm btn-light me-2">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            Ajukan Bansos
                        </h4>
                    </div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('warga.bansos.store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="pendidikan" class="col-form-label">Pendidikan:</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option value="1">Tamat SLTA</option>
                                    <option value="2">Tamat SLTP</option>
                                    <option value="3">Tamat SD</option>
                                    <option value="4">Tidak Tamat SD</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pekerjaan" class="col-form-label">Pekerjaan:</label>
                                <select class="form-control" id="pekerjaan" name="pekerjaan">
                                    <option value="1">Swasta</option>
                                    <option value="2">Petani</option>
                                    <option value="3">Buruh</option>
                                    <option value="4">IRT</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="penghasilan" class="col-form-label">Penghasilan:</label>
                                <select class="form-control" id="penghasilan" name="penghasilan">
                                    <option value="1">> Rp.1.000.000</option>
                                    <option value="2">Rp.750.000-Rp.900.000</option>
                                    <option value="3">Rp.600.000-Rp.700.000</option>
                                    <option value="4">Rp.500.000-Rp.550.000</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status_kepemilikan_rumah" class="col-form-label">Status Kepemilikan
                                    Rumah:</label>
                                <select class="form-control" id="status_kepemilikan_rumah" name="status_kepemilikan_rumah">
                                    <option value="1">Milik sendiri</option>
                                    <option value="2">Milik orang tua/anak</option>
                                    <option value="3">Tidak memiliki rumah/kontrak</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fasilitas_wc" class="col-form-label">Fasilitas WC:</label>
                                <select class="form-control" id="fasilitas_wc" name="fasilitas_wc">
                                    <option value="1">WC pribadi/milik sendiri</option>
                                    <option value="2">WC Umum</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fasilitas_listrik" class="col-form-label">Fasilitas Listrik:</label>
                                <select class="form-control" id="fasilitas_listrik" name="fasilitas_listrik">
                                    <option value="1">Listrik PLN 1.300 W</option>
                                    <option value="2">Listrik PLN 900 W</option>
                                    <option value="3">Listrik PLN 450 W</option>
                                    <option value="4">Tanpa listrik/Lampu tembok</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="bahan_bakar" class="col-form-label">Bahan Bakar:</label>
                                <select class="form-control" id="bahan_bakar" name="bahan_bakar">
                                    <option value="1">Gas LPG</option>
                                    <option value="2">Minyak tanah</option>
                                    <option value="3">Kayu bakar</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kepemilikan_tabungan" class="col-form-label">Kepemilikan Tabungan:</label>
                                <select class="form-control" id="kepemilikan_tabungan" name="kepemilikan_tabungan">
                                    <option value="1">Tabungan > Rp.1000.000</option>
                                    <option value="2">Tabungan < Rp.1000.000</option>
                                    <option value="3">Tidak memiliki tabungan</option>
                                </select>
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

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

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
    </style>
@endpush
