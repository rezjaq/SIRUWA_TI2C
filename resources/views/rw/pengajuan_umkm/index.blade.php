@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <h3 class="card-title d-inline-block text-white">Kelola Pengajuan UMKM Warga</h3>
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
                <thead class="table-header">
                    <tr>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Jenis Usaha</th>
                        <th>Alamat Usaha</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usahaWarga as $usaha)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $usaha->warga->nama }}</td>
                            <td>{{ $usaha->nama_usaha }}</td>
                            <td>{{ $usaha->jenis_usaha }}</td>
                            <td>{{ $usaha->alamat_usaha }}</td>
                            <td>
                                <a href="{{ route('admin.pengajuan.detail', $usaha->id_usahaWarga) }}" class="btn btn-primary">Detail</a>
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
    .card-header {
        background-color: #03774A !important;
        color: #fff !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125) !important;
    }

    .table-header {
        background-color: #03774A !important;
        color: #fff !important;
    }

    .btn-primary {
        background-color: #03774A !important;
        border-color: #03774A !important;
    }

    .btn-primary:hover {
        background-color: #025C3A !important;
        border-color: #025C3A !important;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }

    .table-header th {
        color: #fff !important;
    }

    .alert-success {
        background-color: #D4EDDA !important;
        border-color: #C3E6CB !important;
        color: #155724 !important;
    }
</style>
@endpush
