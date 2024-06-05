@extends('layouts.app')

@section('content')
<section class="header-section">
    <h2>Dokumentasi</h2>
    <p>Selamat datang di halaman dokumentasi. Di sini Anda dapat melihat dokumentasi dari berbagai acara dan kegiatan kami.</p>
</section>
<section class="gallery-section">
    <div class="gallery">
        <div class="gallery-row">
            <div class="gallery-item">
                <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 1</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/lomba.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 2</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/maulid nabi.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 3</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 4</p>
            </div>
        </div>
        <div class="gallery-row">
            <div class="gallery-item">
                <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 1</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/lomba.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 2</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/maulid nabi.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 3</p>
            </div>
            <div class="gallery-item">
                <img src="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}" alt="">
                <p class="caption">Deskripsi Foto 4</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .header-section {
        text-align: center;
        margin-top: 5%;
        padding: 0 10%;
    }

    .header-section h2 {
        font-size: 2.5em;
        font-weight: bold;
    }

    .header-section p {
        font-size: 1.2em;
        margin-top: 1%;
    }

    .gallery-section {
        padding: 2% 5%;
    }

    .gallery {
        display: flex;
        flex-direction: column;
        gap: 2%;
    }

    .gallery-row {
        display: flex;
        flex-wrap: wrap;
        gap: 2%;
    }

    .gallery-item {
        flex: 1 1 calc(25% - 2%);
        margin-bottom: 2%;
        position: relative;
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        border-radius: 2px;
        transition: transform 0.3s ease;
    }

    .gallery-item img:hover {
        transform: scale(1.05);
    }

    .caption {
        text-align: center;
        margin-top: 0.5em;
        font-size: 0.9em;
        color: gray;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .gallery-item {
            flex: 1 1 calc(50% - 2%);
        }
    }

    @media (max-width: 480px) {
        .gallery-item {
            flex: 1 1 calc(100% - 2%);
        }
    }
</style>
@endpush

@push('js')
<script>
    // Optional: Add any JavaScript needed for the gallery, like a lightbox effect
</script>
@endpush
