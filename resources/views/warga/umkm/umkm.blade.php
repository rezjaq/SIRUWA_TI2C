@extends('layouts.app')

@section('title', 'Daftar UMKM Warga ')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
    <section id="about" class="about">
        <div class="container py-0">
            <!-- Search and Filter -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari UMKM...">
                </div>
                <div class="col-md-6">
                    <select id="filterSelect" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Catering">Catering</option>
                        <option value="Roti">Roti</option>
                        <option value="Kopi">Kopi</option>
                        <option value="Mie Pangsit">Mie Pangsit</option>
                        <option value="Jajanan Pasar">Jajanan Pasar</option>
                        <option value="Tahu Telor">Tahu Telor</option>
                    </select>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                <div class="col">
                    <div class="card" data-value="Catering">
                        <img src="{{ asset('assets/img/catering.JPG') }}" class="card-img-top img-fluid" alt="Catering Mbak Fatim" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Catering Mbak Fatim</b></h5>
                            <p class="card-text">Nikmati cita rasa autentik dari Catering Mbak Fatim untuk setiap acara Anda. Pesan sekarang dan rasakan kualitas terbaik dengan harga terjangkau!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 12K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>                           
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" data-value="Roti">
                        <img src="{{ asset('assets/img/roti.JPG') }}" class="card-img-top img-fluid" alt="Roti Goreng Onggojoyo" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Roti Goreng Onggojoyo</b></h5>
                            <p class="card-text">Cicipi roti goreng renyah dan lezat serta moho lembut khas Onggojoyo. Kelezatan autentik yang memanjakan lidah di setiap gigitan!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 2.5K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" data-value="Kopi">
                        <img src="{{ asset('assets/img/kopi.JPG') }}" class="card-img-top img-fluid" alt="Kopi Dampit" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Kopi Dampit</b></h5>
                            <p class="card-text">Nikmati kopi Dampit dengan aroma khas dan cita rasa yang menggugah selera. Rasakan kelezatan kopi berkualitas tinggi dari lereng Gunung Dampit.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 7K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" data-value="Mie Pangsit">
                        <img src="{{ asset('assets/img/miePangsit.JPG') }}" class="card-img-top img-fluid" alt="Mie Pangsit Hendro" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Mie Pangsit Hendro</b></h5>
                            <p class="card-text">Rasakan mie pangsit kenyal dan kuah yang gurih. Cocok untuk dinikmati kapan saja, terutama saat hujan.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 8K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" data-value="Jajanan Pasar">
                        <img src="{{ asset('assets/img/kue.JPG') }}" class="card-img-top img-fluid" alt="Jajanan Pasar Mbak Amel" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Jajanan Pasar Mbak Amel</b></h5>
                            <p class="card-text">Nikmati kelezatan jajanan pasar dengan cita rasa tradisional yang autentik dengan kenangan manis di setiap gigitannya!</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 2K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" data-value="Tahu Telor">
                        <img src="{{ asset('assets/img/tahuTelor.JPG') }}" class="card-img-top img-fluid" alt="Tahu Telor Mbak Suci" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Tahu Telor Mbak Suci</b></h5>
                            <p class="card-text">Hidangan utama dengan tahu yang renyah dan telur yang gurih, disajikan dengan bumbu khas yang menggugah selera.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> 10K</h3>
                            <a href="https://web.whatsapp.com/send?phone=628123252008&text=Assalamualaikum..%0Mbak%20Fatim%20Catering" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
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

        .breadcrumb-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
        }

        .breadcrumb-container .btn-back {
            font-size: 24px;
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb-container .btn-back:hover {
            color: #0056b3;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            background-color: #227D54;
            border: none;
        }

        .btn-primary i {
            font-size: 24px;
        }

        h3, h5 {
            color: #03774A;
        }

        .small-text {
            font-size: 0.6em;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 600px) {
            .breadcrumb-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .breadcrumb-container .btn-back {
                margin-top: 10px;
            }
        }
        @media (max-width: 767px) {
            .row.mb-3 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .row.mb-3 .col-md-6 {
                width: auto;
                margin-bottom: 0;
            }
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-up {
            animation: fadeUp 0.5s ease forwards;
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            const searchInput = document.getElementById('searchInput');
            const filterSelect = document.getElementById('filterSelect');

            function filterUMKM() {
                const searchTerm = searchInput.value.toLowerCase();
                const category = filterSelect.value.toLowerCase();

                cards.forEach(card => {
                    const cardCategory = card.getAttribute('data-value').toLowerCase();

                    // Pengecekan kategori
                    if ((searchTerm === '' || cardCategory.includes(searchTerm)) && (category === '' || cardCategory === category)) {
                        card.style.display = 'block';
                        card.classList.add('fade-up');
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('fade-up');
                    }
                });
            }

            searchInput.addEventListener('input', filterUMKM);
            filterSelect.addEventListener('change', filterUMKM);
        });

    </script>
@endpush


