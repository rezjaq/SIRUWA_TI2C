@extends('layouts.app')

@section('title', 'History Pengaduan Warga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-custom text-white">
            <h3 class="card-title">History Pengaduan</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5 class="fw-bold">Detail Pengaduan</h5>
                <p>Nama: {{ $aduan->nama }}</p>
                <p>Tempat: {{ $aduan->tempat }}</p>
                <p>Tanggal: {{ $aduan->tanggal }}</p>
                <p>Isi Pengaduan: {{ $aduan->isi }}</p>
                <!-- Tambahkan tag untuk menampilkan foto jika diperlukan -->
            </div>
            <div class="mb-3">
                <h5 class="fw-bold">History Tindakan</h5>
                @if($history->isEmpty())
                    <p>Tidak ada history tindakan untuk pengaduan ini.</p>
                @else
                    <ul>
                        @foreach($history as $item)
                            <li>{{ $item->action }} pada {{ $item->created_at }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        /* Tambahkan CSS khusus jika diperlukan */
    </style>
@endpush
