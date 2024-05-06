@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pengumuman</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengumuman as $p)
                <tr>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->status_pengumuman }}</td>
                    <td>
                        <!-- Tombol untuk melihat detail pengumuman -->
                        <a href="{{ route('pengumuman.show', $p->id_pengumuman) }}" class="btn btn-info">Detail</a>
                        
                        <!-- Tombol untuk mengedit pengumuman -->
                        <a href="{{ route('pengumuman.edit', $p->id_pengumuman) }}" class="btn btn-primary">Edit</a>
                        
                        <!-- Tombol untuk menghapus pengumuman -->
                        <form action="{{ route('pengumuman.destroy', $p->id_pengumuman) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Tombol untuk pindah ke halaman tambah data pengumuman -->
        <a href="{{ route('pengumuman.create') }}" class="btn btn-success">Tambah Pengumuman</a>
    </div>
@endsection
