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
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    List Pengaduan
                </div>
                <div class="card-body">
                    @foreach ($pengaduans as $pengaduan)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $pengaduan->nama }}</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <strong>Tempat:</strong> {{ $pengaduan->tempat }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Tanggal Aduan:</strong> {{ $pengaduan->created_at->format('d M Y') }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <strong>Status Aduan:</strong> 
                                        @if ($pengaduan->status_aduan == 'pending')
                                            <span class="badge badge-warning">Masih Diproses</span>
                                        @elseif ($pengaduan->status_aduan == 'approved')
                                            <span class="badge badge-success">Disetujui</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </p>
                                    <p class="card-text">
                                        <strong>Komentar:</strong> {{ $pengaduan->komentar ?: 'Belum ada komentar' }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="card-text mb-3">
                                <strong>Deskripsi:</strong> {{ $pengaduan->isi }}
                            </p>
                            <div class="mb-3">
                                <p class="fw-bold mb-1">Foto:</p>
                                @if ($pengaduan->foto)
                                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="img-fluid rounded">
                                @else
                                    <p class="text-muted">Tidak ada foto</p>
                                @endif
                            </div>
                        </div>
                    </div>                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .bg-primary {
            background-color: #03774A !important;
        }
        .card-title {
            color: #03774A;
            font-weight: bold;
            font-size: 1.25rem;
        }
        .badge-warning {
            background-color: #ffc107;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .card-body img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .card-body {
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
        }
        .card-header {
            border-radius: 0.5rem 0.5rem 0 0;
            padding: 1rem 1.5rem;
        }
        hr {
            border-top: 1px solid #e0e0e0;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .fw-bold {
            font-weight: bold;
        }
    </style>
@endpush
