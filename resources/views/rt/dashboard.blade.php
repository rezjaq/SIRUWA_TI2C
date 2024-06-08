@extends('template-admin.template')

@section('content')
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">{{ $page->title }}</h4>
            </div>
        </div>
        <div class="card-body">
            <h5>Selamat datang di Dashboard RT</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Jumlah Warga</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah warga di RT ini: <span class="fw-bold">{{ $jumlahWarga }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Jumlah Keluarga</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah keluarga di RT ini: <span class="fw-bold">{{ $jumlahKeluarga }}</span></p>
                        </div>
                    </div>
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
