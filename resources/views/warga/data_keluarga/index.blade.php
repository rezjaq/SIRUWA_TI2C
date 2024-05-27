@extends('layouts.app')

@section('title', 'Data Warga Wilayah RW 02')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container">
    <!-- Tombol untuk pindah ke halaman tambah data keluarga -->
    <a href="{{ route('warga.keluarga.create') }}" class="btn btn-primary mb-3" style="background-color: #03774A;">
        <i class="fas fa-user-plus me-2"></i> Tambah Data Keluarga
    </a>



    <!-- Tabel data warga -->
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
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
@endsection

@push('css')
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
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
