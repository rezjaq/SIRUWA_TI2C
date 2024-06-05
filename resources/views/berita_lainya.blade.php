@extends('layouts.app')

@section('title', 'Berita Lainnya')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container py-5">
    <div class="header-berita text-center fade-up mb-5">
        <h2 class="fw-bold">Berita Lainnya</h2>
    </div>

    <div class="row">
        @foreach ($pengumuman as $item)
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm" onclick="location.href='{{ route('berita.show', $item->id_pengumuman) }}'">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top img-fluid mb-3" alt="{{ $item->judul }}">
                    @else
                        <img src="{{ asset('assets/img/berita.JPG') }}" class="card-img-top img-fluid mb-3" alt="{{ $item->judul }}">
                    @endif
                    <div class="card-body">
                        <p class="card-text text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</p>
                        <h4 class="card-title fw-bold mb-3">{{ $item->judul }}</h4>
                        <p class="text-secondary">{{ $item->isi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        {{ $pengumuman->links() }} <!-- Tambahkan pagination links -->
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
