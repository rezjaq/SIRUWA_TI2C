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

    <div class="row mb-4">
        <div class="col-md-6">
            <a href="{{ route('warga.Warga.create') }}" class="btn btn-success btn-add">
                <i class="fas fa-user-plus me-2"></i> Tambah Warga
            </a>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('warga.Warga.edit') }}" class="btn btn-primary btn-verify" >
                <i class="fas fa-user-check me-2"></i> Verifikasi Warga
            </a>
        </div>
    </div>

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
@endsection

@push('css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .btn-add {
            background-color: #03774A;
            border-radius: 15px;
            border-color: #03774A;
            color: #fff;
        }
        .btn-add:hover {
            background-color: #035C3A;
            border-color: #035C3A;
            color: #fff;
        }
        .btn-verify {
            background-color: #007BFF;
            border-radius: 15px;
            border-color: #007BFF;
            color: #fff;
        }
        .btn-verify:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
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

