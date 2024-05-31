@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <h3 class="card-title d-inline-block text-white">Kelola Pengaduan Warga</h3>
        </div>
    </div>
        <div class="card-body">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Isi Pengaduan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aduans as $aduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $aduan->nama }}</td>
                                <td>{{ $aduan->tempat }}</td>
                                <td>{{ $aduan->tanggal }}</td>
                                <td>{{ $aduan->isi }}</td>
                                <td><img src="{{ asset('storage/' . $aduan->foto) }}" alt="Foto Pengaduan" width="100"></td>
                                <td>
                                    <form action="{{ route('RT.pengaduan.approve', $aduan->id_aduan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('RT.pengaduan.reject', $aduan->id_aduan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
