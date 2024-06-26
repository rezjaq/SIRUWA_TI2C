@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Mengelola Penguman</h5>
            <div>
                <a href="{{ route('pengumuman.create') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-plus me-2"></i> Tambah Pengumuman Desa
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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_pengumuman">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
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
    $(document).ready(function () {
        var dataPengumuman = $('#table_pengumuman').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('pengumuman.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function(d){
                    // d.id_pengumuman = $('#id_pengumuman').val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "judul",
                    name: "judul",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "tanggal",
                    name: "tanggal",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "status_pengumuman",
                    name: "status_pengumuman",
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

        $('#id_pengumuman').on('change', function(){
            dataPengumuman.ajax.reload(); 
        });
    });
</script>
@endpush
