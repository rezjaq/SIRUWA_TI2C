@extends('layouts.app')

@section('content')
<section id="foto" class="section-foto parallax">
    <div class="container py-5 fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4 fade-up">
            <div class="d-flex align-items-center">
                <div class="stripe-putih me-2"></div>
                <h5 class="fw-bold text-white">Dokumentasi Wilayah RW 02</h5>
            </div>
            <div>
                <a href="" class="btn btn-outline-light">Dokumentasi Lainnya</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{asset('assets/img/kerja bakti.jpg')}}">
                    <img src="{{asset('assets/img/kerja bakti.jpg')}}" class="img-fluid rounded" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{asset('assets/img/lomba.jpg')}}">
                    <img src="{{asset('assets/img/lomba.jpg')}}" class="img-fluid rounded" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{asset('assets/img/maulid nabi.jpg')}}">
                    <img src="{{asset('assets/img/maulid nabi.jpg')}}" class="img-fluid rounded" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}">
                    <img src="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}" class="img-fluid rounded" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
@endsection 

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>
        
    </script>
@endpush