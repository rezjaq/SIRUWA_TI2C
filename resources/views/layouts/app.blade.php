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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
        background-color: #f5f5f5;
        padding-top: 100px; /* Adjust based on the height of your navbar */
    }

    .navbar {
        margin-bottom: 20px; /* Space between navbar and breadcrumb */
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

        <!-- Breadcrumb -->
        @yield('breadcrumb')

        <!-- Content -->
        <section id="content" class="content py-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <div class="container-fluid p-0">
            @include('layouts.footer')
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('.navbar');
            const isHomePage = window.location.pathname === '/'; // Adjust this if your home route is different

            function checkScroll() {
                if (window.scrollY > 50 || !isHomePage) {
                    navbar.classList.add('scroll-nav-active');
                } else {
                    navbar.classList.remove('scroll-nav-active');
                }
            }

            // Initial check when the page loads
            checkScroll();

            // Event listener for scroll to toggle scroll-nav-active class
            window.addEventListener('scroll', checkScroll);
        });
    </script>
    
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
