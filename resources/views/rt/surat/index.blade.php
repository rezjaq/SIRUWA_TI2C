@extends('template-admin.template')

@section('content')
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: #03774A; color: #fff;">
                <h5 class="mb-0">Mengelola Surat</h5>
                <div>
                    <a href="{{ route('rt.surat.create') }}" class="btn btn-outline-light">
                        <i class="fas fa-user-plus me-2"></i> Tambah Data Pengajuan
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table_surat">
                        <thead class="table-header">
                            <tr>
                                <th>NIK</th>
                                <th>Nama Warga</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
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

        .table th,
        .table td {
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
        $(document).ready(function() {
            var dataTableSurat = $('#table_surat').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('rt.surat.list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d._token = '{{ csrf_token() }}';
                    }
                },
                columns: [{
                        data: "nik",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "nama",
                        name: "warga.nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jenis_surat",
                        name: "jenis_surat",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "tanggal_surat",
                        name: "tanggal_surat",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "keterangan",
                        name: "keterangan",
                        className: "",
                        orderable: true,
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
