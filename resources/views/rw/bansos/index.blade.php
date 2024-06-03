@extends('template-admin.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <!-- Tombol untuk pindah ke halaman tambah data bansos -->
            <a href="{{ route('RW.bansos.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Data Bansos
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
                <thead>
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
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="${rejectUrl}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        `;
                    }
                }
            ]
        });
    });
</script>
@endpush
