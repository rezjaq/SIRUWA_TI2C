@extends('layouts.app')

@section('title', 'Cek Status Pengajuan')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')

<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: #03774A; color: #fff;">
                <h4 class="mb-0">
                    <a href="{{ route('umkm') }}" class="btn btn-sm btn-light me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Ajuan UMKM Anda
                </h4>
            </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if($usahaWarga->isEmpty())
            <p>Tidak ada UMKM yang diajukan.</p>
        @else
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Nama Usaha</th>
                        <th>Jenis Usaha</th>
                        <th>Nomor Telepon</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usahaWarga as $usaha)
                        <tr>
                            <td>{{ $usaha->nama_usaha }}</td>
                            <td>{{ $usaha->jenis_usaha }}</td>
                            <td>{{ $usaha->nomer_telepon }}</td>
                            <td>{{ $usaha->harga }}</td>
                            <td>{{ $usaha->status }}</td>
                            <td>
                                <form action="{{ route('umkm.destroy', $usaha->id_usahaWarga) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        </div>
    </div>
</div>
@endsection

@push('css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        /* CSS untuk tampilan desktop */
        .table-header {
            background-color: #03774A;
            color: #fff;
        }
        .table-header th {
            border-bottom: 2px solid #ddd;
        }
        .btn-outline-light {
            border: 1px solid #fff;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-outline-light:hover {
            background-color: #fff;
            color: #03774A;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }
        .table th {
            background-color: #03774A;
            color: #fff;
        }
        /* CSS untuk tampilan mobile */
        @media (max-width: 767.98px) {
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                flex-direction: column;
                align-items: flex-start;
            }
            .dataTables_wrapper .dataTables_length select {
                order: 2;
                margin-left: auto;
            }
            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin-left: 0;
                margin-top: 10px;
                order: 1;
            }
            .dataTables_wrapper .dataTables_filter label {
                order: 3;
            }
            /* Atur tampilan tombol hapus agar sesuai dengan tampilan mobile */
            .btn-danger {
                font-size: 12px;
                padding: 5px 10px;
            }
        }
    </style>
@endpush
