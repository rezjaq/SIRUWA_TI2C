@extends('template-admin.template')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
        <div class="card-header bg-custom text-white">
            <h4 class="mb-0">
                <a href="{{ route('RW.bansos.ranked-scores') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Detail Pengajuan Bansos
            </h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5>Informasi Warga</h5>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NIK</th>
                        <td>{{ $bansos->warga->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $bansos->warga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $bansos->warga->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $bansos->warga->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $bansos->warga->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>{{ $bansos->warga->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $bansos->warga->agama }}</td>
                    </tr>
                    <tr>
                        <th>Status Kawin</th>
                        <td>{{ $bansos->warga->statusKawin }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $bansos->warga->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>No. RT</th>
                        <td>{{ $bansos->warga->no_rt }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Informasi Pengajuan Bansos</h5>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Pendidikan</th>
                        <td>{{ $kriteria['pendidikan'][$bansos->pendidikan] }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $kriteria['pekerjaan'][$bansos->pekerjaan] }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan</th>
                        <td>{{ $kriteria['penghasilan'][$bansos->penghasilan] }}</td>
                    </tr>
                    <tr>
                        <th>Status Kepemilikan Rumah</th>
                        <td>{{ $kriteria['status_kepemilikan_rumah'][$bansos->status_kepemilikan_rumah] }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas WC</th>
                        <td>{{ $kriteria['fasilitas_wc'][$bansos->fasilitas_wc] }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas Listrik</th>
                        <td>{{ $kriteria['fasilitas_listrik'][$bansos->fasilitas_listrik] }}</td>
                    </tr>
                    <tr>
                        <th>Bahan Bakar</th>
                        <td>{{ $kriteria['bahan_bakar'][$bansos->bahan_bakar] }}</td>
                    </tr>
                    <tr>
                        <th>Kepemilikan Tabungan</th>
                        <td>{{ $kriteria['kepemilikan_tabungan'][$bansos->kepemilikan_tabungan] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .bg-custom {
            background-color: #03774A !important;
        }

        .card-header {
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        .card-tools .btn {
            color: #fff;
            border-radius: 5px;
        }

        .card-tools .btn:hover {
            color: #fff;
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
            font-weight: bold; /* Menjadikan teks tebal */
        }
    </style>
@endpush

