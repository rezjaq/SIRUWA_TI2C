@extends('template-admin.template')

@section('content')
    <div class="container">
        <h1>Daftar Kegiatan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                        <td>
                            @if($kegiatan->waktu_selesai)
                                {{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}
                            @else
                                {{ $kegiatan->waktu_mulai }} - Selesai
                            @endif
                        </td>
                        <td>{{ $kegiatan->lokasi_kegiatan }}</td>
                        <td>{{ $kegiatan->status_kegiatan }}</td>
                        <td>
                            <!-- Tombol untuk menuju halaman show -->
                            <a href="{{ route('kegiatan.show', $kegiatan->id_kegiatan) }}" class="btn btn-info">Detail</a>
                            <!-- Tombol untuk menuju halaman edit -->
                            <a href="{{ route('kegiatan.edit', $kegiatan->id_kegiatan) }}" class="btn btn-primary">Edit</a>
                            <!-- Tombol untuk menghapus kegiatan dengan konfirmasi -->
                            <form action="{{ route('kegiatan.destroy', $kegiatan->id_kegiatan) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Tombol untuk menuju halaman tambah kegiatan -->
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>
@endsection
