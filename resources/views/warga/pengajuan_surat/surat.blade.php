@extends('layouts.app')

@section('title', 'List Formulir Surat')

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
            <h5 class="mb-0">List Form Surat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="formSuratTable" class="table table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formSurat as $key => $form)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $form->judul }}</td>
                            <td>{{ $form->deskripsi }}</td>                           
                            <td class="text-center">
                                <a href="{{ route('warga.form_surat.preview', $form->id) }}" class="btn btn-success">Lihat</a>
                                <a href="{{ asset('storage/' . $form->file_path) }}" class="btn btn-success" download>Unduh</a>
                            </td>
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
        $('#formSuratTable').DataTable({
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
