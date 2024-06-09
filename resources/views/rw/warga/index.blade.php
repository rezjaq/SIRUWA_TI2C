@extends('template-admin.template')

@section('content')
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: #03774A; color: #fff; border-radius: 10px 10px 0 0; padding: 1rem;">
                <h5 class="mb-0">{{ $page->title }}</h5>
                <div>
                    <a href="{{ route('Warga.create') }}" class="btn btn-outline-light">
                        <i class="fas fa-user-plus me-2"></i> Tambah Data Warga
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

                <div class="d-flex mb-3">
                    <select id="data-type-selector" class="form-control w-auto">
                        <option value="Warga.list">Warga Hidup</option>
                        <option value="Warga.listDeceased">Warga Meninggal</option>
                    </select>
                </div>

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
            var table = $('#table_warga').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('Warga.list') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columns: [{
                        data: "nik",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "nama",
                        name: "nama",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "jenis_kelamin",
                        name: "jenis_kelamin",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "alamat",
                        name: "alamat",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "no_telepon",
                        name: "no_telepon",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "agama",
                        name: "agama",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "statusKawin",
                        name: "statusKawin",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "pekerjaan",
                        name: "pekerjaan",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "no_rt",
                        name: "no_rt",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#data-type-selector').on('change', function() {
                var selectedValue = $(this).val();
                var newUrl;

                if (selectedValue === 'Warga.listDeceased') {
                    newUrl = "{{ route('Warga.listDeceased') }}";
                } else {
                    newUrl = "{{ route('Warga.list') }}";
                }

                table.ajax.url(newUrl).load();
            });

        });
    </script>
@endpush
