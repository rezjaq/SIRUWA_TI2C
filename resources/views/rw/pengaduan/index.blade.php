@extends('template-admin.template')

@section('title', 'Kelola Pengaduan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-custom text-white">
            <h3 class="card-title">Kelola Pengaduan</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat</th>
                        <th>Tanggal</th>
                        <th>Isi Pengaduan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aduans as $aduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aduan->nama }}</td>
                            <td>{{ $aduan->tempat }}</td>
                            <td>{{ $aduan->tanggal }}</td>
                            <td>{{ $aduan->isi }}</td>
                            <td><img src="{{ asset('storage/' . $aduan->foto) }}" alt="Foto Pengaduan" width="100"></td>
                            <td>
                                <form action="{{ route('pengaduan.approve', $aduan->id_aduan) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('pengaduan.reject', $aduan->id_aduan) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        }
        .card {
            border-radius: 10px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
@endpush
