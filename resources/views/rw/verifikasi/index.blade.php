@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Vertifikasi Data Warga</h5>
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
                url: "{{ route('verifikasi.list') }}",
                dataType: "json",
                type: "POST",
                data: {
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
                    data: "keterangan",
                    name: "keterangan",
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "aksi",
                    name: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `
                        <a href="#" class="btn btn-primary btn-sm mr-1" onclick="showDetail('${row.nik}')" style="width: 40px; height: 40px; margin-right: 5px;">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="btn btn-success btn-sm mr-1" onclick="approve('${row.nik}')" style="width: 40px; height: 40px; margin-right: 5px;">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="reject('${row.nik}')" style="width: 40px; height: 40px;">
                            <i class="fas fa-times"></i>
                        </button>
                        `;
                    }
                }
            ]
        });

        window.showDetail = function (nik) {
            window.location.href = "{{ route('verifikasi.show', '') }}/" + nik;
        }

        window.approve = function (nik) {
            $.ajax({
                url: "{{ route('verifikasi.approve', '') }}/" + nik,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert(response.success);
                    dataWarga.ajax.reload();
                },
                error: function (response) {
                    alert(response.error);
                }
            });
        }

        window.reject = function (nik) {
            $.ajax({
                url: "{{ route('verifikasi.reject', '') }}/" + nik,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert(response.success);
                    dataWarga.ajax.reload();
                },
                error: function (response) {
                    alert(response.error);
                }
            });
        }
    });
</script>
@endpush
