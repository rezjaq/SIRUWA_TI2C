@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Mengelola Kegiatan Desa</h5>
            <div>
                <a href="{{ route('RW.bansos.create') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-plus me-2"></i> Tambah Data Bansos
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
                <table class="table table-bordered table-striped table-hover table-sm" id="table_ranked_scores">
                    <thead class="table-header">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Warga</th>
                            <th>Skor Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div
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
        var dataRankedScores = $('#table_ranked_scores').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('RW.bansos.ranked-scores.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nik_warga",
                    name: "nik_warga",
                    className: "text-center",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "nama_warga",
                    name: "nama_warga",
                    className: "text-center",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "score",
                    name: "score",
                    className: "text-center",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "id",
                    name: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        var showUrl = "{{ route('RW.Bansos.show', ':id') }}".replace(':id', data);
                        var approveUrl = "{{ route('RW.Bansos.approve', ':id') }}".replace(':id', data);
                        var rejectUrl = "{{ route('RW.Bansos.reject', ':id') }}".replace(':id', data);

                        return `
                            <a href="${showUrl}" class="btn btn-info btn-sm">Detail</a>
                            <form action="${approveUrl}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="${rejectUrl}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        `;
                    }
                }
            ]
        });
    });
</script>
@endpush
