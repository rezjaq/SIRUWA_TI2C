@extends('layouts.app')

@section('title', 'Data Kepala Keluarga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">Data Kepala Keluarga</h5>
            <!-- Tombol untuk pindah ke halaman tambah data keluarga dan update data keluarga -->
            <div class="d-flex">
                <a href="{{ route('warga.keluarga.create') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-user-plus me-2"></i> Tambah Data Keluarga
                </a>
                <a href="{{ route('warga.keluarga.edit') }}" class="btn btn-outline-light">
                    <i class="fas fa-edit me-2"></i> Update Data Keluarga
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Tabel data warga -->
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>No RT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluargas as $key => $keluarga)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $keluarga->nama_kepala_keluarga }}</td>
                            <td>{{ $keluarga->alamat }}</td>
                            <td>{{ $keluarga->no_rt }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    /* CSS tambahan untuk meningkatkan tampilan */
    .table-header {
        background-color: #03774A;
        color: #fff;
    }

    .table-header th {
        border-bottom: 2px solid #ddd;
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
    }

    .card-header {
        border-bottom: none;
        border-radius: 10px 10px 0 0;
    }

    /* CSS untuk tampilan mobile */
    @media (max-width: 767.98px) {
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            flex-direction: column;
            align-items: flex-start;
        }
        .dataTables_wrapper .dataTables_length select {
            order: 2; /* Pindahkan select "Show entries" ke kanan */
            margin-left: auto; /* Atur margin kiri agar ada di sebelah kanan */
        }
        .dataTables_wrapper .dataTables_filter input {
            width: 100%;
            margin-left: 0;
            margin-top: 10px;
            order: 1; /* Pindahkan input "Search" ke kiri */
        }
        .dataTables_wrapper .dataTables_filter label {
            order: 3; /* Pindahkan label "Show" ke bawah */
        }
    }
</style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": true, // Aktifkan paginasi
                "lengthChange": true, // Tampilkan pilihan jumlah entri
                "searching": true, // Aktifkan fitur pencarian
                "ordering": true, // Aktifkan sorting
                "info": true, // Tampilkan informasi halaman
                "autoWidth": false, // Matikan otomatis lebar kolom
                "responsive": true, // Aktifkan responsif tabel
                // Ganti "Show X entries" dengan teks yang diinginkan
                "language": {
                    "lengthMenu": "Show _MENU_ entries", // Ubah "Show X entries"
                    "zeroRecords": "No records found",
                    "info": "Showing page _PAGE_ of _PAGES_", // Sesuaikan teks informasi
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "search": "Search:", // Sesuaikan teks pencarian
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                }
            });
        });
    </script>
@endpush
