<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Rukun Warga</title>
    <link rel="shortcut icon" href="{{asset('assets/icon/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/stylee.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark py-2 fixed-top" segmen>
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- Logo -->
                <img src="{{ asset('assets/img/siruwa.png') }}" height="55" width="55" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard-warga') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengajuan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pengajuanDropdown">
                            <li><a class="dropdown-item" href="#">Warga Pindahan</a></li>
                            <li><a class="dropdown-item" href="#">Warga Asli</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bansos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="#">Jenis Bansos</a></li>
                            <li><a class="dropdown-item" href="#">Pengajuan</a></li>
                            <li><a class="dropdown-item" href="#">Daftar Penerima Bansos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Denah Rumah Warga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">UMKM</a>
                    </li>
                </ul>
                @auth
                    <div class="d-flex">
                        <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                    </div>
                @else
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
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Denah Rumah Warga">
                    <img src="{{ asset('assets/icon/map.png') }}" alt="Denah Rumah Warga">
                    <div class="program-title">Denah Rumah Warga</div>
                </a>
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Pengaduan Warga">
                    <img src="{{ asset('assets/icon/3.png') }}" alt="Pengaduan Warga">
                    <div class="program-title">Pengaduan Warga</div>
                </a>
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="UMKM Warga">
                    <img src="{{ asset('assets/icon/4.png') }}" alt="UMKM Warga">
                    <div class="program-title">UMKM Warga</div>
                </a>
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Bantuan Sosial">
                    <img src="{{ asset('assets/icon/5.png') }}" alt="Bantuan Sosial">
                    <div class="program-title">Bantuan Sosial</div>
                </a>
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Pengajuan Bansos">
                    <img src="{{ asset('assets/icon/bansos.png') }}" alt="Pengajuan Bansos">
                    <div class="program-title">Pengajuan Bansos</div>
                </a>
                <a href="{{ route('warga-tetap') }}" class="program-ikon check-login" aria-label="Penerima Bansos" >
                    <img src="{{ asset('assets/icon/penerima.png') }}" alt="Penerima Bansos">
                    <div class="program-title">Penerima Bansos</div>
                </a>
                <a href="{{ route('data-diri') }}" class="program-ikon check-login" aria-label="Data Diri" >
                    <img src="{{ asset('assets/icon/penerima.png') }}" alt="Data Diri">
                    <div class="program-title">Data Diri</div>
                </a>
            </div>
        </div>
    </section>


    
    
    
    <br><br>
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

    {{-- Kegiatan --}}
    <section id="upcoming-events" class="upcoming-events">
        <div class="container" fade-up>
            <div class="header-kegiatan text-center fade-up">
                <h2 class="fw-bold">Kegaiatan Mendatang Wilayah RW. 02</h2>
            </div>
          <div class="carousel-container py-5 fade-up">
            <div class="row">
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-img">
                    <img src="{{asset('assets/img/senam sehat.jpg')}}" alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-center py-2"><a href="">Senam Sehat</a></h5>
                    <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">06:00 - selesai</span></p>
                    <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Jumat, 19 April 2024</span></p>
                    <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Lapangan Utara</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-img">
                    <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-center py-2"><a href="">Kerja Bakti</a></h5>
                    <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">06:30 - selesai</span></p>
                    <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Minggu, 21 April 2024</span></p>
                    <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Seluruh Wilayah RW. 02</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-img">
                    <img src="{{asset('assets/img/berita.JPG')}}" alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-center py-2"><a href="">Lomba 17 Agustusan</a></h5>
                    <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">06:30 - selesai</span></p>
                    <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Minggu, 21 April 2024</span></p>
                    <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Halaman Rumah</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-img">
                    <img src="{{asset('assets/img/posyandu.jpg')}}" alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-center py-2"><a href="">Posyandu</a></h5>
                    <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">09:00 - selesai</span></p>
                    <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Jumat, 19 Mei 2024</span></p>
                    <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Pos Posyandu</span></p>
                  </div>
                </div>
              </div>
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
    {{-- dokumentasi --}}


   {{-- footer --}}
    <section id="footer" class="bg-white">
        <div class="container py-5 fade-up">
            <footer>
                <div class="row fade-up">
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
                                    <span class="fa fa-phone"></span> 
                                    <span class="icon-text">082222222222</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tel:085555555555" class="nav-link p-0 text-muted">
                                    <span class="fa fa-phone"></span> 
                                    <span class="icon-text">085555555555</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    {{-- kolom 4 Alamat --}}
                    <div class="col-12 col-md-3 mb-4">
                        <h5 class="font-inter fw-bold mb-4">Alamat Desa</h5>
                        <p class="text-muted">
                            <i class="fas fa-map-marker-alt"></i> RW. 02 Kelurahan Candirenggo Kec. Singosari, Kabupaten Malang, Jawa Timur
                        </p>
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
         document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.querySelector(".fixed-top");
            window.addEventListener("scroll", () => {
                if (window.scrollY > 100) {
                    navbar.classList.add("scroll-nav-active");
                    navbar.classList.add("text-nav-active");
                    navbar.classList.remove("navbar-dark");
                    navbar.classList.add("navbar-light");
                } else {
                    navbar.classList.remove("scroll-nav-active");
                    navbar.classList.remove("text-nav-active");
                    navbar.classList.remove("navbar-light");
                    navbar.classList.add("navbar-dark");
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
            const scrollInterval = setInterval(function() {
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/check-login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
