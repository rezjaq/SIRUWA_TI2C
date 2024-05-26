@extends('template-admin.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <!-- Tombol untuk pindah ke halaman tambah data kegiatan -->
                <a href="{{ route('activity.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kegiatan
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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_kegiatan">
                    <thead>
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
@endsection

@push('css')
    <style>
        .card-header {
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: scale(1.05);
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            color: #555;
        }

        .table thead th {
            border-top: none;
            background-color: #f4f4f4;
            color: #333;
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
                    "url": "{{ route('activity.list') }}",
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
