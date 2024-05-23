@extends('layouts.app')

@section('content')
    <section id="about" class="about">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/catering.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Catering Mbak Fatim</b></h5>
                            <p class="card-text">Nikmati cita rasa autentik dari Catering Mbak Fatim untuk setiap acara Anda. Pesan sekarang dan rasakan kualitas terbaik dengan harga terjangkau!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 12K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/roti.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Roti Goreng Onggojoyo</b></h5>
                            <p class="card-text">Cicipi roti goreng renyah dan lezat serta moho lembut khas Onggojoyo. Kelezatan autentik yang memanjakan lidah di setiap gigitan!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 2.5K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/kopi.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Kopi Dampit</b></h5>
                            <p class="card-text">Nikmati kopi Dampit dengan aroma khas dan cita rasa yang menggugah selera. Rasakan kelezatan kopi berkualitas tinggi dari lereng Gunung Dampit.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 7K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/miePangsit.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Mie Pangsit Hendro</b></h5>
                            <p class="card-text">Rasakan mie pangsit kenyal dan kuah yang gurih. Cocok untuk dinikmati kapan saja, terutama saat hujan.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 8K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/kue.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Jajanan Pasar Mbak Amel</b></h5>
                            <p class="card-text">Nikmati kelezatan jajanan pasar dengan cita rasa tradisional yang autentik dengan kenangan manis di setiap gigitannya!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 2K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/img/tahuTelor.JPG') }}" class="card-img-top img-fluid" alt="..." style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Tahu Telor Mbak Suci</b></h5>
                            <p class="card-text">Hidangan utama dengan tahu yang renyah dan telur yang gurih, disajikan dengan bumbu khas yang menggugah selera.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 10K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
        }

        .card-img-top {
            border-radius: 50px;
            padding: 20px;
        }

        .card {
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
            transition: transform 0.3s ease;
        }

        .card-body {
            padding: 25px;
            margin-top: -15px;
        }

        .btn-primary {
            border-radius: 50px;
            width: 120px;
            background-color: #90D995;
            border-color: #90D995;
            color: black;
        }

        .btn-primary:hover {
            background-color: #227D54;
            border: none;
        }

        h3, h5 {
            color: #03774A;
        }

        .small-text {
            font-size: 0.6em;
        }

        /* Additional styles for hover effect */
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.classList.add('shadow-lg');
                });

                card.addEventListener('mouseleave', function () {
                    this.classList.remove('shadow-lg');
                });
            });
        });
    </script>
@endpush
