<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Informasi Rukun Warga</title>
    <link rel="shortcut icon" href="{{asset('assets/icon/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/stylee.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .btn-login,
        .btn-login-notif {
            background-color: #03774A !important;
            color: #fff !important;
            border: none !important;
            padding: 10px 20px !important;
            font-size: 16px !important;
            border-radius: 5px !important;
            cursor: pointer !important;
            margin-right: 10px !important; 
        }

        .btn-cancel,
        .btn-cancel-notif {
            background-color: #ccc !important;
            color: #333 !important;
            border: none !important;
            padding: 10px 20px !important;
            font-size: 16px !important;
            border-radius: 5px !important;
            cursor: pointer !important;
            margin-left: 10px !important; 
        }

        .btn-login:hover,
        .btn-login-notif:hover {
            background-color: #026a3d !important;
        }

        .btn-cancel:hover,
        .btn-cancel-notif:hover {
            background-color: #bbb !important;
        }

    </style>
</head>
<body>

     {{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/siruwa.png') }}" height="55" width="55" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('dashboard-warga') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard-warga') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::routeIs('warga-tetap') || Request::routeIs('warga-pindah') ? 'active' : '' }}" href="#" id="pengajuanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengajuan Surat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pengajuanDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga-tetap') }}">Surat Warga Tetap</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga-pindah') }}">Surat Warga Pindahan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" {{ Request::routeIs('warga.Warga.index') || Request::routeIs('warga.keluarga.index') ? 'active' : '' }}" href="#" id="dataWargaDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pengecekan Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataWargaDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga.Warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.keluarga.index') }}">Data Keluarga</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::routeIs('bansos.*') ? 'active' : '' }}" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bantuan Sosial
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga.bansos.create') }}">Pengajuan</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.bansos.penerima') }}">Daftar Penerima Bansos</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route('pengajuan-bansos') }}">Pengajuan</a></li>
                            <li><a class="dropdown-item" href="{{ route('daftar-penerima-bansos') }}">Daftar Penerima Bansos</a></li> --}}
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::routeIs('pengaduan.*') ? 'active' : '' }}" href="#" id="pengaduanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pengaduan Warga</a>
                        <ul class="dropdown-menu" aria-labelledby="pengaduanDropdown">
                            <li><a class="dropdown-item {{ Request::routeIs('pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}">Daftar Pengaduan</a></li>
                            {{-- <li><a class="dropdown-item {{ Request::routeIs('pengaduan.show') ? 'active' : '' }}" href="{{ route('pengaduan.show') }}">History Pengaduan</a></li> --}}
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::routeIs('pengajuan-umkm*') ? 'active' : '' }}" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            UMKM
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="{{ route('pengajuan-umkm') }}">Macam Macam UMKM</a></li>
                            <li><a class="dropdown-item" href="{{ route('umkm.create') }}">Pengajuan UMKM</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                    <a href="{{ route('logout') }}" class="btn btn-custom">Logout</a>
                </div>
            @else
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#upcoming-events">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#foto">Dokumentasi</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
{{-- navbar --}}



    <section id="hero" class="px-0">
        <div class="overlay"></div>
        <div class="container text-center text-white d-flex justify-content-center align-items-center fade-up">
            <div class="hero-title">
                <div class="hero-text">
                    Sistem Informasi Rukun Warga Wilayah RW. 02 Kelurahan Candirenggo Kecamatan Singosari
                </div>
            </div>
        </div>
    </section>

    {{-- program --}}
        <section id="program" class="mt-4">
            <div class="program-container fade-up">
                <div class="program-baris-ikon">
                    <div class="program-ikon dropdown">
                        <a href="#" class="dropdown-toggle text-decoration-none" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/icon/2.png') }}" alt="Pengajuan Surat">
                            <div class="program-title">Pengajuan Surat</div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item check-login" href="{{ route('warga-tetap') }}">Surat Warga Tetap</a></li>
                            <li><a class="dropdown-item check-login" href="{{ route('warga-pindah') }}">Surat Warga Pindahan</a></li>
                        </ul>
                    </div>
                    <a href="{{ route('pengaduan') }}" class="program-ikon check-login" aria-label="Pengaduan Warga">
                        <img src="{{ asset('assets/icon/3.png') }}" alt="Pengaduan Warga">
                        <div class="program-title">Pengaduan Warga</div>
                    </a>
                    <div class="program-ikon dropdown">
                        <a href="#" class="dropdown-toggle text-decoration-none" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/icon/4.png') }}" alt="UMKM Warga">
                            <div class="program-title">UMKM Warga</div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item check-login" href="{{ route('pengajuan-umkm') }}">Macam-Macam UMKM</a></li>
                            <li><a class="dropdown-item check-login" href="{{ route('umkm.create') }}">Pengajuan UMKM</a></li>
                        </ul>
                    </div>
                    <a href="#" class="program-ikon check-login" aria-label="Bantuan Sosial">
                        <img src="{{ asset('assets/icon/5.png') }}" alt="Bantuan Sosial">
                        <div class="program-title">Bantuan Sosial</div>
                        
                    </a>
                    <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Pengajuan Bansos">
                        <img src="{{ asset('assets/icon/bansos.png') }}" alt="Pengajuan Bansos">
                        <div class="program-title">Pengajuan Bansos</div>
                    </a>
                    <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Penerima Bansos">
                        <img src="{{ asset('assets/icon/penerima.png') }}" alt="Penerima Bansos">
                        <div class="program-title">Penerima Bansos</div>
                    </a>
                    <div class="program-ikon dropdown">
                        <a href="#" class="dropdown-toggle text-decoration-none" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/icon/pengecekan.png') }}" alt="Pengecekan Data">
                            <div class="program-title">Pengecekan Data</div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item check-login" href="{{ route('warga.Warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item check-login" href="{{ route('warga.keluarga.index') }}">Data Kepala Keluarga</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    {{-- program --}}

    <br><br><br><br>
    {{-- Berita --}}
        <section id="berita">
            <div class="container py-5 fade-up">
                <div class="header-berita text-center fade-up mb-5">
                    <h2 class="fw-bold">Berita Terbaru Wilayah RW. 02</h2>
                </div>

                <div class="row gy-4">
                    @foreach ($pengumuman as $item)
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm" onclick="location.href='{{ route('berita.show', $item->id_pengumuman) }}'">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top img-fluid mb-3" alt="{{ $item->judul }}" style="width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/berita.JPG') }}" class="card-img-top img-fluid mb-3" alt="{{ $item->judul }}" style="width: 100%; height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <p class="card-text text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</p>
                                <h4 class="card-title fw-bold mb-3">{{ $item->judul }}</h4>
                                <p class="text-secondary">{{ \Illuminate\Support\Str::limit($item->isi, 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="footer-berita text-center mt-3">
                    <a href="{{ route('berita_lainnya') }}" class="btn btn-outline-success">Berita Lainnya</a>
                </div> --}}
            </div>
        </section>
    {{-- berita --}}




    {{-- Kegiatan --}}
    <section id="upcoming-events" class="upcoming-events">
        <div class="container" fade-up>
            <div class="header-kegiatan text-center fade-up">
                <h2 class="fw-bold">Kegiatan Mendatang Wilayah RW. 02</h2>
            </div>
            <div class="carousel-container py-5 fade-up">
                <div class="row">
                    @foreach ($kegiatan as $item)
                    <div class="col-lg-3">
                        <div class="card">
                            @if ($item->foto)
                                <div class="card-img">
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_kegiatan }}" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                            @else
                                <div class="card-img">
                                    <img src="{{ asset('assets/img/default.jpg') }}" alt="{{ $item->nama_kegiatan }}" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center py-2">{{ $item->nama_kegiatan }}</h5>
                                <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai ? $item->waktu_selesai : 'selesai' }}</span></p>
                                <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('l, d F Y') }}</span></p>
                                <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">{{ $item->lokasi_kegiatan }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- Static cards for demo purposes -->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/senam sehat.jpg') }}" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center py-2"><a href="{{ route('events') }}">Senam Sehat</a></h5>
                                <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">06:00 - selesai</span></p>
                                <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Jumat, 19 April 2024</span></p>
                                <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Lapangan Utara</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for other static cards -->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/kerja bakti.jpg') }}" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center py-2"><a href="{{ route('events') }}">Kerja Bakti</a></h5>
                                <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">06:30 - selesai</span></p>
                                <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Minggu, 21 April 2024</span></p>
                                <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Seluruh Wilayah RW. 02</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more static cards if needed -->
                </div>
            </div>
        </div>
    </section>
{{-- Kegiatan --}}

    
    {{-- dokumentasi --}}
        <br>
        <section id="foto" class="section-foto parallax">
            <div class="container py-5 fade-up">
                <div class="d-flex justify-content-between align-items-center mb-4 fade-up">
                    <div class="d-flex align-items-center">
                        <div class="stripe-putih me-2"></div>
                        <h5 class="fw-bold text-white">Dokumentasi Wilayah RW 02</h5>
                    </div>
                    <div>
                        <a href="{{ route('dokumentasi') }}" class="btn btn-outline-light">Dokumentasi Lainnya</a>
                    </div>
                </div>
        
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6 col-6">
                        <a class="image-link" href="{{asset('assets/img/kerja bakti.jpg')}}">
                            <img src="{{asset('assets/img/kerja bakti.jpg')}}" class="img-fluid-doc rounded" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <a class="image-link" href="{{asset('assets/img/lomba.jpg')}}">
                            <img src="{{asset('assets/img/lomba.jpg')}}" class="img-fluid-doc rounded" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <a class="image-link" href="{{asset('assets/img/maulid nabi.jpg')}}">
                            <img src="{{asset('assets/img/maulid nabi.jpg')}}" class="img-fluid-doc rounded" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <a class="image-link" href="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}">
                            <img src="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}" class="img-fluid-doc rounded" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    {{-- dokumentasi --}}


    {{-- footer --}}
   <section id="footer" class="bg-white">
    <div class="container py-5 fade-up">
      <footer>
        <div class="row fade-up">
          {{-- logo and description --}}
          <div class="col-12 col-md-3 mb-4">
            <div class="logo-description" style="max-width: 230px;"> <!-- add max-width -->
              <img src="{{ asset('assets/img/siruwaFooter.png') }}" alt="Logo" class="logo">
              <p class="description">Akses digitalisasi untuk informasi dan layanan warga</p>
            </div>
          </div>
                    {{-- kolom 1 Navigasi --}}
                    <div class="col-12 col-md-3 mb-4">
                        <h5 class="fw-bold mb-4">Navigasi</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">Beranda</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#berita" class="nav-link p-0 text-muted">Berita</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#upcoming-events" class="nav-link p-0 text-muted">Kegiatan</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#foto" class="nav-link p-0 text-muted">Dokumentasi</a>
                            </li>
                        </ul>
                    </div>

                    {{-- kolom 2 Media Sosial --}}
                    <div class="col-12 col-md-3 mb-4">
                        <h5 class="fw-bold mb-4">Follow Kami</h5>
                        <div class="d-flex">
                            <a href="" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{asset('assets/icon/ig.ico')}}" height="30" width="30" class="me-3" alt="Instagram Icon">
                                <a href="https://www.instagram.com/nggadungan?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="nav-link p-0 text-muted">nggadungan</a>
                            </a>
                        </div>
                    </div>

                    {{-- kolom 3 Kontak --}}
                    <div class="col-12 col-md-3 mb-4">
                        <h5 class="font-inter fw-bold mb-4">Kontak</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="mailto:katosi.onggojoyo@gmail.com" class="nav-link p-0 text-muted"> 
                                    <span class="fa fa-envelope"></span> 
                                    <span class="icon-text">katosi.onggojoyo@gmail.com</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tel:0822222222222" class="nav-link p-0 text-muted">
                                    <span class="fas fa-phone fa-flip-horizontal"></span> 
                                    <span class="icon-text">082222222222</span>
                                </a>
                            </li>

                            <li class="nav-item mb-2">
                                <a href="https://maps.app.goo.gl/GQnGXpcnKqJPHJsd9?g_st=ico" class="nav-link p-0 text-muted">
                                    <span class="fas fa-map-marker-alt"></span> 
                                    <span class="icon-text">RW. 02 Kelurahan Candirenggo Kecamatan Singosari, Kabupaten Malang, Jawa Timur</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                   
                </div>
            </footer>
        </div>
    </section>

        <footer id="footer-bottom" class="text-white py-3">
            <div class="container text-center">
                &copy; Copyright <strong><span>2024 SIRUWA | Sistem Informasi Rukun Warga</span></strong>
            </div>
        </footer>
    {{-- footer --}}

    
    {{-- src navbar scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('.navbar');

            // Event listener for scroll to toggle scroll-nav-active class
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    navbar.classList.add('scroll-nav-active');
                } else {
                    navbar.classList.remove('scroll-nav-active');
                }
            });
        });
    </script>
    {{-- src navbar scroll --}}


    {{-- src kegiatan --}}
    <script>
        function autoScrollDiv() {
            const container = document.querySelector('.carousel-container .row');
            let scrollAmount = 0;
            const scrollInterval = setInPterval(function() {
                if (scrollAmount < container.scrollWidth - container.clientWidth) {
                    container.scrollBy({ left: 300, top: 0, behavior: 'smooth' });
                    scrollAmount += 300;
                } else {
                    container.scrollTo({ left: 0, top: 0, behavior: 'smooth' });
                    scrollAmount = 0;
                }
            }, 5000); 
        }
        document.addEventListener('DOMContentLoaded', autoScrollDiv);
    </script>
    {{-- src kegiatan --}}


    <!-- Script untuk mendeteksi kapan elemen muncul dan menambahkan class visible -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-up');

            function callback(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }

            const observer = new IntersectionObserver(callback);
            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>

    {{-- buat change password masih belum bisa --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Login Berhasil',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    showConfirmButton: false, 
                    timer: 3000 
                });
            @endif
        });
    </script>
    

    <script src="{{ asset('assets/js/check-login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>