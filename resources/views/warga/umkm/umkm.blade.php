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
            <!-- Notifikasi -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Search and Filter -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari UMKM...">
                </div>
                <div class="col-md-6">
                    <select id="filterSelect" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($usahaWarga->unique('jenis_usaha') as $umkm)
                            <option value="{{ $umkm->jenis_usaha }}">{{ $umkm->jenis_usaha }}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5" id="umkmCards">
                @foreach($usahaWarga as $umkm)
                <div class="col">
                    <div class="card" data-value="{{ $umkm->jenis_usaha }}">
                        <img src="{{ asset('storage/' . $umkm->foto) }}" class="card-img-top img-fluid" alt="{{ $umkm->nama_usaha }}" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $umkm->nama_usaha }}</b></h5>
                            <p class="card-text">{{ $umkm->deskripsi }}</p>
                            <p class="card-text">{{ $umkm->alamat_usaha }}</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around align-items-center">
                            <h3><span class="small-text">Harga mulai</span> {{ $umkm->harga }}</h3>
                            <!-- Ganti URL WhatsApp dengan nomor yang sesuai dari data UMKM jika diperlukan -->
                            <a href="https://wa.me/{{ $umkm->nomer_telepon }}" class="btn btn-primary" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            const searchInput = document.getElementById('searchInput');
            const filterSelect = document.getElementById('filterSelect');

            // Add shadow effect on hover
            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.classList.add('shadow-lg');
                });

                card.addEventListener('mouseleave', function () {
                    this.classList.remove('shadow-lg');
                });
            });

            // Filter function
            function filterUMKM() {
                const searchText = searchInput.value.toLowerCase();
                const selectedCategory = filterSelect.value;

                cards.forEach(card => {
                    const title = card.querySelector('.card-title').textContent.toLowerCase();
                    const category = card.getAttribute('data-value');

                    const matchesSearch = title.includes(searchText);
                    const matchesCategory = !selectedCategory || category === selectedCategory;

                    if (matchesSearch && matchesCategory) {
                        card.parentElement.style.display = '';
                    } else {
                        card.parentElement.style.display = 'none';
                    }
                });
            }

            // Event listeners for search and filter
            searchInput.addEventListener('input', filterUMKM);
            filterSelect.addEventListener('change', filterUMKM);
        });
    </script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.classList.add('fade-out');
                    alert.addEventListener('transitionend', function() {
                        alert.remove();
                    });
                }
            }, 5000); // Notifikasi hilang setelah 5 detik
        });
    </script>
    
@endpush


