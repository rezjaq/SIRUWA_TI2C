@extends('template-admin.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kepala Keluarga : {{ $keluarga->nama_kepala_keluarga }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID Keluarga:</label>
                            <input type="text" class="form-control" value="{{ $keluarga->id_keluarga }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>No KK:</label>
                            <input type="text" class="form-control" value="{{ $keluarga->no_kk }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" class="form-control" value="{{ $keluarga->alamat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>No RT:</label>
                            <input type="text" class="form-control" value="{{ $keluarga->no_rt }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Gambar KK:</label>
                            @if($keluarga->kk)
                                <img src="{{ asset('storage/' . $keluarga->kk) }}" class="img-fluid" alt="Gambar KK">
                            @else
                                <span>Tidak ada gambar KK.</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Tambahkan bagian lain yang ingin ditampilkan di sini -->
                    </div>
                </div>

                <!-- Anggota Keluarga -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h4>Anggota Keluarga</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keluarga->anggota as $anggota)
                                    <tr>
                                        <td>{{ $anggota->nik }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tombol kembali -->
                <a href="{{ route('keluarga.index') }}" class="btn btn-secondary"
                    style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
            </div>
        </div>
    </div>
@endsection
