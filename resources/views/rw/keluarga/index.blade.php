@extends('template-admin.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <!-- Tombol untuk pindah ke halaman tambah data kegiatan -->
            <a href="{{ route('keluarga.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Keluarga
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
                <thead>
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
        var dataPengumuman = $('#table_keluarga').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('keluarga.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function(d){
                    // d.id_kegiatan = $('#id_kegiatan').val();
                    d._token = '{{ csrf_token() }}';
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
                    data: "nama_kepala_keluarga",
                    name: "nama_kepala_keluarga",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "nomor_nik",
                    name: "nomor_nik",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "alamat",
                    name: "alamat",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "no_rt",
                    name: "no_rt",
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

        $('#id_keluarga').on('change', function(){
            dataKeluarga.ajax.reload(); 
        });
    });
</script>
@endpush
