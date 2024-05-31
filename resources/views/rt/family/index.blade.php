@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Mengelola Data Kepala Keluarga</h5>
            <div>
                <a href="{{ route('family.create') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-plus me-2"></i> Tambah Data Keluarga
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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_keluarga">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>NO.KK</th>
                            <th>Alamat</th>
                            <th>NO.RT</th>
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
        var dataKeluarga = $('#table_keluarga').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('family.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function(d){
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                { data: "id_keluarga", className: "text-center", orderable: false, searchable: false },
                { data: "nama_kepala_keluarga", name: "nama_kepala_keluarga", className: "", orderable: false, searchable: true },
                { data: "no_kk", name: "no_kk", className: "", orderable: false, searchable: true },
                { data: "alamat", name: "alamat", className: "", orderable: false, searchable: true },
                { data: "no_rt", name: "no_rt", className: "", orderable: false, searchable: true },
                { data: "aksi", name: "aksi", className: "text-center", orderable: false, searchable: false }
            ]
        });

        $('#id_keluarga').on('change', function(){
            dataKeluarga.ajax.reload(); 
        });
    });
</script>
@endpush
