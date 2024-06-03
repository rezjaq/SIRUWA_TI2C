@extends('layouts.app')

@section('title', 'Daftar Penerima Bansos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Penerima Bansos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nomor RT</th>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerimas as $penerima)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $penerima->warga->nama }}</td>
                                        <td>{{ $penerima->warga->jenis_kelamin }}</td>
                                        <td>{{ $penerima->warga->no_rt }}</td>
                                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
