@extends('layouts.app')

@section('title', 'Data Kepala Keluarga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('bansos-store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nik_warga">NIK Warga</label>
            <input type="text" name="nik_warga" id="nik_warga" class="form-control @error('nik_warga') is-invalid @enderror" value="{{ old('nik_warga') }}">
            @error('nik_warga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pendapatan_1bln">Pendapatan 1 Bulan</label>
            <input type="number" name="pendapatan_1bln" id="pendapatan_1bln" class="form-control @error('pendapatan_1bln') is-invalid @enderror" value="{{ old('pendapatan_1bln') }}">
            @error('pendapatan_1bln')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sktm">SKTM</label>
            <input type="text" name="sktm" id="sktm" class="form-control @error('sktm') is-invalid @enderror" value="{{ old('sktm') }}">
            @error('sktm')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status_pengajuan">Status Pengajuan</label>
            <input type="text" name="status_pengajuan" id="status_pengajuan" class="form-control @error('status_pengajuan') is-invalid @enderror" value="{{ old('status_pengajuan') }}">
            @error('status_pengajuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pendidikan_terakhir" data-value="{{$kriteria->nama_kriteria}}">Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                <option value="">Pilih Pendidikan Terakhir</option>
            
            </select>
            @error('pendidikan_terakhir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <select name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                <option value="">Pilih Pekerjaan</option>
               
            </select>
            @error('pekerjaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penghasilan">Penghasilan</label>
            <select name="penghasilan" id="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror">
                <option value="">Pilih Penghasilan</option>
                
            </select>
            @error('penghasilan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status_kepemilikan_rumah">Status Kepemilikan Rumah</label>
            <select name="status_kepemilikan_rumah" id="status_kepemilikan_rumah" class="form-control @error('status_kepemilikan_rumah') is-invalid @enderror">
                <option value="">Pilih Status Kepemilikan Rumah</option>
                
            </select>
            @error('status_kepemilikan_rumah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fasilitas_wc">Fasilitas WC</label>
            <select name="fasilitas_wc" id="fasilitas_wc" class="form-control @error('fasilitas_wc') is-invalid @enderror">
                <option value="">Pilih Fasilitas WC</option>
                
            </select>
            @error('fasilitas_wc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fasilitas_listrik">Fasilitas Listrik</label>
            <select name="fasilitas_listrik" id="fasilitas_listrik" class="form-control @error('fasilitas_listrik') is-invalid @enderror">
                <option value="">Pilih Fasilitas Listrik</option>
                
            </select>
            @error('fasilitas_listrik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
@endsection
