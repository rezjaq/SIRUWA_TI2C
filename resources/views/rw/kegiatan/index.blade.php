@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Mengelola Kegiatan Desa</h5>
            <div>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-plus me-2"></i> Tambah Kegiatan Desa
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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_kegiatan">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Status</th>
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
        $(document).ready(function() {
            var dataPengumuman = $('#table_kegiatan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('kegiatan.list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        // d.id_kegiatan = $('#id_kegiatan').val();
                        d._token = '{{ csrf_token() }}';
                    }
                },
                columns: [{
                        data: "id_kegiatan",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "nama_kegiatan",
                        name: "nama_kegiatan",
                        className: "",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "tanggal_kegiatan",
                        name: "tanggal_kegiatan",
                        className: "",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Gabungkan waktu mulai dan waktu selesai jika ada
                            var waktu = row.waktu_mulai;
                            if (row.waktu_selesai) {
                                waktu += ' - ' + row.waktu_selesai;
                            } else {
                                waktu += ' - Selesai';
                            }
                            return waktu;
                        },
                        className: "",
                        orderable: false,
                        searchable: true
                    },

                    {
                        data: "lokasi_kegiatan",
                        name: "lokasi_kegiatan",
                        className: "",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "status_kegiatan",
                        name: "status_kegiatan",
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

            $('#id_kegiatan').on('change', function() {
                dataKegiatan.ajax.reload();
            });
        });
    </script>
@endpush
