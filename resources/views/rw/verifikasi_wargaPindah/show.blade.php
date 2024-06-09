@extends('template-admin.template')

@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #03774A; color: #fff;">
            <div>
                <a href="{{ route('verifikasiWargaPindah.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-title d-inline-block text-white">Detail Warga: {{ $warga->nama }}</h3>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>NIK</th>
                            <td>{{ $warga->nik }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $warga->nama }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $warga->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $warga->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $warga->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>{{ $warga->no_telepon }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ $warga->agama }}</td>
                        </tr>
                        <tr>
                            <th>Status Kawin</th>
                            <td>{{ $warga->statusKawin }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $warga->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>No RT</th>
                            <td>{{ $warga->no_rt }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Alamat Asal</th>
                            <td>{{ $warga->alamat_asal }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pindah</th>
                            <td>{{ $warga->tanggal_pindah }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $warga->status }}</td>
                        </tr>
                        <tr>
                            <th>Foto KTP</th>
                            <td>
                                @if ($warga->foto_ktp)
                                    <img src="{{ asset('storage/' . $warga->foto_ktp) }}" alt="Foto KTP" style="max-width: 100px;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Foto Surat Pindah</th>
                            <td>
                                @if ($warga->foto_surat_pindah)
                                    <img src="{{ asset('storage/' . $warga->foto_surat_pindah) }}" alt="Foto Surat Pindah" style="max-width: 100px;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-between">
                <a href="{{ route('WargaPindah.index') }}" class="btn btn-secondary">Kembali</a>
                <div>
                    <form class="d-inline-block" method="POST" action="{{ route('WargaPindah.approve', $warga->id_wargaPindahMasuk) }}">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin menyetujui data ini?');">Approve</button>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{ route('WargaPindah.reject', $warga->id_wargaPindahMasuk) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">Reject</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
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
</style>
@endpush
