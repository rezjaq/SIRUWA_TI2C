@extends('template-admin.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title">Detail Warga</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $warga->nik }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $warga->status }}</td>
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
                        @if($warga->status == 'belum_disetujui')
                        <tr>
                            <th>Kartu Keluarga</th>
                            <td>
                                @if($kkPath)
                                    <img src="{{ asset($kkPath) }}" alt="Kartu Keluarga" style="max-width: 200px;">
                                @else
                                    <p>Tidak ada foto KK</p>
                                @endif
                            </td>
                        </tr>                        
                        @endif
                    </tbody>
                </table>
                <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
