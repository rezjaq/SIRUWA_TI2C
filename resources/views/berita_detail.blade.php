@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list'],
    ])
    @endcomponent
@endsection

@section('content')
    <div class="container py-5">
        <div class="header-berita text-center fade-up mb-5">
            <h2 class="fw-bold">{{ $pengumuman->judul }}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    @if ($pengumuman->foto)
                        <img src="{{ asset('storage/' . $pengumuman->foto) }}" class="card-img-top img-fluid mb-3"
                            alt="{{ $pengumuman->judul }}">
                    @else
                        <img src="{{ asset('assets/img/berita.JPG') }}" class="card-img-top img-fluid mb-3"
                            alt="{{ $pengumuman->judul }}">
                    @endif
                    <div class="card-body">
                        <p class="card-text text-muted">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d-m-Y') }}
                        </p>
                        <p class="text-secondary">{{ $pengumuman->isi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
