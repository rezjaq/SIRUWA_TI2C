@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pengumuman</h1>
        <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi Pengumuman</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="status_pengumuman">Status Pengumuman</label>
                <select class="form-control" id="status_pengumuman" name="status_pengumuman" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
