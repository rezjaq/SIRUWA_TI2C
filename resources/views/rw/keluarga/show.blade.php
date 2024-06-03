@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-title d-inline-block text-white">Detail Keluarga: {{ $keluarga->nama_kepala_keluarga }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="from-group">
                    <div class="form-group mb-3">
                        <label class="fw-bold">ID Keluarga:</label>
                        <input type="text" class="form-control" value="{{ $keluarga->id_keluarga }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">No KK:</label>
                        <input type="text" class="form-control" value="{{ $keluarga->no_kk }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Alamat:</label>
                        <input type="text" class="form-control" value="{{ $keluarga->alamat }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">No RT:</label>
                        <input type="text" class="form-control" value="{{ $keluarga->no_rt }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="fw-bold">Gambar KK:</label>
                        @if($keluarga->kk)
                            <img src="{{ asset('storage/' . $keluarga->kk) }}" class="img-fluid" alt="Gambar KK" data-bs-toggle="modal" data-bs-target="#kkModal">
                        @else
                            <span class="text-muted">Tidak ada gambar KK.</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Anggota Keluarga -->
            <div class="form-group">
                <div class="col-12">
                    <h4 class="fw-bold">Anggota Keluarga</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keluarga->anggota as $anggota)
                                    <tr>
                                        <td>{{ $anggota->nik }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->jenis_kelamin }}</td>
                                        <td>{{ $anggota->statusKawin}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for KK Image -->
    <div class="modal fade" id="kkModal" tabindex="-1" aria-labelledby="kkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kkModalLabel">Gambar KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/' . $keluarga->kk) }}" class="img-fluid" alt="Gambar KK">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /* Custom CSS */
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

    </style>
@endpush

@push('scripts')
    <script>
        // Custom script for modal and other interactions if needed
    </script>
@endpush
