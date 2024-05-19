@extends('layouts.app')

@section('content')
{{-- berita --}}
<section id="berita">
    <div class="container py-5 fade-up">


        <div class="header-berita text-center fade-up">
            <h2 class="fw-bold">Berita Terbaru Wilayah RW. 02</h2>
        </div>

        <div class="row py-5">
            <div class="col-lg-4">
                <div class="card broder-0">
                    <img src="{{asset('assets/img/berita.JPG')}}" class="img-fluid mb-3" alt="">
                    <div class="konten-berita">
                        <p class="mb-3">15-05-2024</p>
                        <h4 class="fw-bold mb-3">Karnaval</h4>
                        <p class="text-secondary">#desamoderen</p>
                        <a href="" class="text-decoration-none text-danger">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card broder-0">
                    <img src="{{asset('assets/img/berita.JPG')}}" class="img-fluid mb-3" alt="">
                    <div class="konten-berita">
                        <p class="mb-3">15-05-2024</p>
                        <h4 class="fw-bold mb-3">Karnaval</h4>
                        <p class="text-secondary">#desamoderen</p>
                        <a href="" class="text-decoration-none text-danger">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card broder-0">
                    <img src="{{asset('assets/img/berita.JPG')}}" class="img-fluid mb-3" alt="">
                    <div class="konten-berita">
                        <p class="mb-3">15-05-2024</p>
                        <h4 class="fw-bold mb-3">Karnaval</h4>
                        <p class="text-secondary">#desamoderen</p>
                        <a href="" class="text-decoration-none text-danger">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-berita text-center">
            <a href="" class="btn btn-outline-success">Berita Lainnya</a>
        </div>
    </div>
</section>
{{-- berita --}}
@endsection