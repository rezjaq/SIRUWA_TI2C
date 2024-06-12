@extends('layouts.app')

@section('title', 'Daftar Penerima Bansos')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #03774A; color: #fff;">
                    <h4 class="mb-0">
                        <a href="{{ route('bansos') }}" class="btn btn-sm btn-light me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        List Penerima Bantuan Sosial
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor RT</th>
                                    <th scope="col">Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerimas as $penerima)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penerima->warga->nama }}</td>
                                    <td>{{ $penerima->warga->jenis_kelamin }}</td>
                                    <td>{{ $penerima->warga->alamat }}</td>
                                    <td>{{ $penerima->warga->no_rt }}</td>
                                    <td>{{ $penerima->score }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .card-header {
            border-bottom: none;
        }
        .btn-light {
            color: #03774A;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #03774A;
            color: #fff;
        }
    </style>
@endpush
