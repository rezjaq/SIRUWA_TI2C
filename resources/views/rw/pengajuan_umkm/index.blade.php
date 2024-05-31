@extends('template-admin.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <h3 class="card-title d-inline-block text-white">Kelola Pengajuan UMKM Warga</h3>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead class="table-header">
                    <tr style="color: white;">
                        <th>Nama Warga</th>
                        <th>Nama Usaha</th>
                        <th>Jenis Usaha</th>
                        <th>Alamat Usaha</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usahaWarga as $usaha)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $usaha->nama_usaha }}</td>
                            <td>{{ $usaha->jenis_usaha }}</td>
                            <td>{{ $usaha->alamat_usaha }}</td>
                            <td>{{ $usaha->foto }}</td>
                            <td>{{ $usaha->status }}</td>
                            <td>
                                @if($usaha->status == 'pending')
                                <form action="{{ route('umkm.approve', ['id' => $usaha->id_usahaWarga]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Setujui</button>
                                </form>
                                <form action="{{ route('umkm.reject', ['id' => $usaha->id_usahaWarga]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>                                                       
                                @else
                                    {{ ucfirst($usaha->status) }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    .table-header {
        background-color: #03774A;
        color: #fff;
        font-weight: bold;
    }

    .table-header th {
        color: #fff;
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
        margin-top: 20px;
    }

    .card-header {
        background-color: #03774A;
        color: #fff;
        border-radius: 10px 10px 0 0;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .alert {
        margin-top: 1rem;
    }

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
    }
</style>
@endpush
