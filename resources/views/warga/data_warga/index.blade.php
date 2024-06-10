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
    @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <h5 class="mb-0">List Data Warga</h5>
            <div class="d-flex">
                <a href="{{ route('warga.Warga.create') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-user-plus me-2"></i> Tambah Warga
                </a>
                <a href="{{ route('warga.Warga.edit') }}" class="btn btn-outline-light">
                    <i class="fas fa-user-edit me-2"></i> Update Data Warga
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="wargaTable" class="table table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Kepala Keluarga</th>
                            <th scope="col">No RT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wargas as $key => $warga)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $warga->nama }}</td>
                            <td>{{ $warga->jenis_kelamin }}</td>
                            <td>{{ $warga->alamat }}</td>
                            <td>{{ $warga->keluarga->nama_kepala_keluarga ?? '-' }}</td>
                            <td class="text-center">{{ $warga->no_rt }}</td>
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
    .btn-outline-light {
        border-color: #fff;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-outline-light:hover {
        background-color: #fff;
        color: #03774A;
    }
    .table th {
            background-color: #03774A;
            color: #fff;
    }
    /* Tambahkan gaya khusus untuk membuat tabel responsif di perangkat seluler */
    @media (max-width: 575.98px) {
        .table-responsive {
            overflow-x: auto;
        }
    }
</style>
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#wargaTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari total _MAX_ data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
            }
        });
    });
</script>
@endpush
