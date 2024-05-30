@extends('template-admin.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $page->title }}</h3>
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
                <thead>
                    <tr>
                        <th>id keluarga</th>
                        <th>NO KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Keterangan</th>
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
        var dataKeluarga = $('#table_keluarga').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('RTVerifikasiKeluarga.list') }}",
                dataType: "json",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {
                    data: "id_keluarga",
                    className: "text-center",
                    orderable: false,
                    searchable: false               
                },
                {
                    data: "no_kk",
                    name: "no_kk",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "nama_kepala_keluarga",
                    name: "nama_kepala_keluarga",
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
                            <a href="#" class="btn btn-primary btn-sm mr-1" onclick="showDetail('${row.id_keluarga}')" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>
                            <button class="btn btn-success btn-sm mr-1" onclick="approve('${row.id_keluarga}')">Setujui</button>
                            <button class="btn btn-danger btn-sm" onclick="reject('${row.id_keluarga}')">Tolak</button>
                        `;
                    }
                }
            ]
        });

        window.showDetail = function (id_keluarga) {
            window.location.href = "{{ route('RTVerifikasiKeluarga.show', '') }}/" + id_keluarga;
        }

        window.approve = function (id_keluarga) {
            $.ajax({
                url: "{{ route('RTVerifikasiKeluarga.approve', '') }}/" + id_keluarga,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert(response.success);
                    dataKeluarga.ajax.reload();
                },
                error: function (response) {
                    alert(response.error);
                }
            });
        }

        window.reject = function (id_keluarga) {
            $.ajax({
                url: "{{ route('RTVerifikasiKeluarga.reject', '') }}/" + id_keluarga,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert(response.success);
                    dataKeluarga.ajax.reload();
                },
                error: function (response) {
                    alert(response.error);
                }
            });
        }
    });
</script>
@endpush
