@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff; border-radius: 10px 10px 0 0; padding: 1rem;">
            <h5 class="mb-0">{{ $page->title }}</h5>
            <div>
                <a href="{{ route('WargaPindah.create') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-plus me-2"></i> Tambah Data Warga
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error')}}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_warga">
                    <thead class="table-header">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Agama</th>
                            <th>Status Kawin</th>
                            <th>Pekerjaan</th>
                            <th>No. RT</th>
                            <th>Asal</th>
                            <th>Tanggal Pindah</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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


@push('js')
<script>
    $(document).ready(function () {
        var dataWarga = $('#table_warga').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('WargaPindah.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {
                    data: "nik",
                    className: "text-center",
                    orderable: false,
                    searchable: false               
                },
                {
                    data: "nama",
                    name: "nama",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "jenis_kelamin",
                    name: "jenis_kelamin",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "tanggal_lahir",
                    name: "tanggal_lahir",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "alamat",
                    name: "alamat",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "no_telepon",
                    name: "no_telepon",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "agama",
                    name: "agama",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "statusKawin",
                    name: "statusKawin",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "pekerjaan",
                    name: "pekerjaan",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "no_rt",
                    name: "no_rt",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "alamat_asal",
                    name: "alamat_asal",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "tanggal_pindah",
                    name: "tanggal_pindah",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "aksi",
                    name: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush
