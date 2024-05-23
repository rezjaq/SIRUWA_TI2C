<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Rukun Warga</title>
    <link rel="shortcut icon" href="{{ asset('assets/icon/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/stylee.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <style>
        .hero-section {
            max-width: 960px;
            margin: auto;
        }
    </style>
    @stack('css')
</head>
<body>

    <div class="container-scroller">
        <!-- Navbar -->
        <div class="container-fluid p-0">
            @include('layouts.navbar')
        </div>
        
        {{-- hero --}}
        <section id="hero" class="px-0" style="height: 400px;">
            <div class="overlay"></div>
            <div class="container text-center text-white d-flex justify-content-center align-items-center fade-up">
                <div class="hero-title">
                    <div class="hero-text" style="font-size: 36px;">Sistem Informasi Rukun Warga Wilayah RW. 02 Kelurahan Candirenggo Kecamatan Singosari</div>
                </div>
            </div>
        </section>


        <!-- Breadcrumb -->
        <div class="container-fluid py-5" style="padding-top: 50px;">
            <div class="row">
                <div class="col-12">
                    @include('layouts.breadcrumb')
                </div>
            </div>
        </div>


        <!-- Content -->  
        <div class="container-fluid my-4 content-below-hero" style="padding-top: 80px;">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        


        <!-- Footer -->
        <div class="container-fluid p-0">
            @include('layouts.footer')
        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @stack('js')
</body>
</html>
