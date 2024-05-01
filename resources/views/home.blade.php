<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIRUWA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="">SIRUWA</a></h1>
      <nav id="navbar" class="navbar">
        <ul> 
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Berita</a></li>
          <li><a class="nav-link scrollto" href="#upcoming-events">Kegiatan</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Dokumentasi</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Sistem Informasi Rukun Warga</h1>
          <h2>SIRUWA adalah platform bantu untuk penyaluran informasi dan administrasi di wilayah RW. 02 Kelurahan Candirenggo, Kecamatan Singosari</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/elemen_dashboard.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    {{-- ini section berita --}}
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita Terbaru</h2>
        </div>

        <div class="carousel-container1">
          <div class="row">
              <div class="col-lg-4">
                  <div class="card border-0">
                      <img src="{{ asset('assets/img/berita.JPG') }}" class="img-fluid" alt="">
                      <div class="konten-berita py-4">
                          <h3 class="fw-bold mb-3">Karnaval</h3>
                          <p class="mb-3"> Kami menyajikan dokumentasi kegiatan yang telah telah dilaksanakan di lingkungan RW.02. Lihat foto-foto tentang kegiatan sosial, gotong royong, dan upaya-upaya lainnya yang telah dilakukan oleh warga kami. Temukan inspirasi untuk berkontribusi lebih banyak lagi!</p>
                          <button id="tampilkanDetail">Lihat Selengkapnya</button>
                      </div>
                  </div>
              </div>
          
              <div class="col-lg-4">
                  <div class="card border-0">                    
                      <img src="{{ asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg') }}" class="img-fluid" alt="">
                      <div class="konten-berita py-4">
                          <h3 class="fw-bold mb-3">Doorprize Gerak Jalan</h3>
                          <p class="mb-3">Acara Gerak Jalan Doorprize RW 02 menawarkan hadiah-hadiah menarik, termasuk voucher belanja, barang lokal, perlengkapan olahraga, dan elektronik kecil. Ada juga paket wisata, makanan, minuman, serta buku-buku. Hadiah-hadiah ini mendukung ekonomi lokal dan mempererat ikatan komunitas di wilayah RW 02.!</p>
                          <button id="tampilkanDetail2">Lihat Selengkapnya</button>
                      </div>
                  </div>
              </div>
          
              <div class="col-lg-4">
                  <div class="card border-0">
                      <img src="{{ asset('assets/img/kerja bakti.jpg') }}" class="img-fluid" alt="">
                      <div class="konten-berita py-4">
                          <h3 class="fw-bold mb-3">Kerja Bakti</h3>
                          <p class="mb-3">>Candirenggo, 29 Agustus 2023 - Warga RW 02 di Kelurahan Candirenggo menggelar kerja bakti yang menorehkan jejak positif dalam pembenahan lingkungan. Puluhan warga dari berbagai kelompok usia ikut serta dalam aksi ini yang dilaksanakan pada hari Minggu lalu.</p>
                          <button id="tampilkanDetail3">Lihat Selengkapnya</button>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="card border-0">
                      <img src="{{ asset('assets/img/berita.JPG') }}" class="img-fluid" alt="">
                      <div class="konten-berita py-4">
                          <h3 class="fw-bold mb-3">Galang Dana</h3>
                          <p class="mb-3">Candirenggo, 29 Agustus 2023 - Warga RW 02 di Kelurahan Candirenggo menggelar kerja bakti yang menorehkan jejak positif dalam pembenahan lingkungan. Puluhan warga dari berbagai kelompok usia ikut serta dalam aksi ini yang dilaksanakan pada hari Minggu lalu.</p>
                          <button id="tampilkanDetail3">Lihat Selengkapnya</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        
        <div id="myModal1" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="{{ asset('assets/img/berita.JPG') }}" class="img-fluid modal-img" alt="">
                <div class="detail-berita py-4">
                    <h2>Judul Berita Lengkap</h2>
                    <p>Karnaval Budaya di RW 02 Kelurahan Candirenggo merupakan sebuah perayaan yang memukau dan meriah, memadukan kekayaan budaya lokal dengan semangat kebersamaan masyarakat. Pada pagi hari yang cerah, jalan utama RW 02 dipenuhi oleh kerumunan warga yang bersemangat, mempersiapkan diri untuk mengikuti dan menyaksikan karnaval yang dinantikan dengan penuh antusiasme.</p>
                </div>
            </div>
        </div>
        
        <div id="myModal2" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="{{ asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg') }}" class="img-fluid modal-img" alt="">
                <div class="detail-berita py-4">
                    <h2>Judul Berita Lengkap</h2>
                    <p>Terdapat beragam hadiah doorprize menarik yang akan disajikan dalam acara Gerak Jalan Doorprize RW 02 Kelurahan Candirenggo, seperti voucher belanja untuk toko lokal atau pusat perbelanjaan, barang-barang lokal seperti kain batik atau makanan khas daerah, perlengkapan olahraga seperti sepatu lari atau kaos olahraga, juga elektronik kecil seperti power bank atau earphone. Selain itu, terdapat juga paket wisata dengan tiket masuk destinasi wisata lokal, paket makanan atau voucher makanan dan minuman, serta beragam buku atau barang bacaan untuk menambah pengetahuan dan hiburan para pemenang. Hadiah-hadiah ini dirancang untuk memberikan kesenangan dan manfaat kepada peserta, sambil mendukung ekonomi lokal dan menguatkan ikatan komunitas di wilayah RW 02.</p>
                </div>
            </div>
        </div>
        
        <div id="myModal3" class="modal">
            <!-- Modal content -->  
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="{{ asset('assets/img/kerja bakti.jpg') }}" class="img-fluid modal-img" alt="">
                <div class="detail-berita py-4">
                    <h2>Judul Berita Lengkap</h2>
                    <p>Candirenggo, 29 Agustus 2023 - Warga RW 02 di Kelurahan Candirenggo menggelar kerja bakti yang menorehkan jejak positif dalam pembenahan lingkungan. Puluhan warga dari berbagai kelompok usia ikut serta dalam aksi ini yang dilaksanakan pada hari Minggu lalu.
                      Kegiatan dimulai pagi hari dengan semangat yang membara dari para peserta. Mereka bergotong royong membersihkan saluran air, trotoar, dan ruang terbuka di sekitar permukiman. Sampah-sampah yang bertumpuk di pinggir jalan dibersihkan, sementara tanaman liar yang mengganggu juga tak luput dari perhatian warga. <br>
                      Selain menata lingkungan, kerja bakti ini juga menjadi momen untuk mempererat tali persaudaraan di antara warga. Mereka saling berbagi cerita, tawa, dan semangat, mencerminkan kesatuan dan solidaritas yang kokoh di antara masyarakat RW 02.
                      Bapak Slamet, salah satu peserta kerja bakti, menyatakan, "Ini adalah tanggung jawab bersama kita untuk menjaga kebersihan lingkungan tempat tinggal kita. Dengan bergotong royong seperti ini, kita tidak hanya membersihkan lingkungan, tetapi juga mempererat hubungan antarsesama warga." <br>
                      Sementara itu, Ketua RW 02, bapak Sriono, menyampaikan apresiasi kepada warga atas partisipasi aktif dalam kegiatan ini. "Kerja bakti seperti ini tidak hanya membawa perubahan fisik yang positif, tetapi juga membangun rasa kebersamaan dan kepedulian di antara kita semua. Semoga semangat gotong royong ini terus terjaga dan menginspirasi lingkungan lainnya."
                      Kerja bakti ini menunjukkan bahwa dengan kekuatan bersatu, masyarakat mampu menciptakan perubahan yang berarti dalam lingkungan mereka. RW 02 berkomitmen untuk terus menjaga kebersihan dan keindahan lingkungan mereka, menjadi teladan bagi lingkungan sekitar.</p>
                </div>
            </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- bagian kegiatan yang akan mendatang -->
    <section id="upcoming-events" class="upcoming-events">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Kegiatan Mendatang</h2>
        </div>
        <div class="carousel-container">
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
                  <h5 class="card-title text-center py-2"><a href="">Maulid Nabi</a></h5>
                  <p class="card-text"><span class="bi bi-alarm"></span> <span class="icon-text">Ba'da Isya</span></p>
                  <p class="card-text"><span class="bi bi-calendar-check"></span> <span class="icon-text">Jumat, 19 April 2024</span></p>
                  <p class="card-text"><span class="bi bi-geo-alt-fill"></span> <span class="icon-text">Masjid Al-Kautsar</span></p>
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

    <!-- ======= Dokumentasi Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dokumentasi</h2>
          <p>Halaman dokumentasi RW.02 berisi kegiatan warga, foto-foto, dan cerita menarik tentang inisiatif lingkungan serta upaya sosial. Ini adalah pengalaman mereka dalam memperindah lingkungan dan meningkatkan kualitas hidup. Mari merayakan prestasi mereka dan terinspirasi untuk melakukan lebih banyak lagi!</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{asset('assets/img/1.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="{{asset('assets/img/2.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{asset('assets/img/3.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="{{asset('assets/img/4.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="{{asset('assets/img/kegiatan-jalan-santai-yang-digelar-gerakan-pemuda-dan-peremp-g4of.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{asset('assets/img/kerja bakti.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="{{asset('assets/img/lomba.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="{{asset('assets/img/maulid nabi.jpg')}}" class="img-fluid" alt=""></div>
            {{-- <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> --}}
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- ini footer coy --}}
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          {{-- <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SIRUWA</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div> --}}

        </div>
      </div>
    </div>
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>2024 SIRUWA | Sistem Informasi Rukun Warga</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- js untuk kegiatan mendatang -->
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

<!-- js untuk berita mendatang -->
<script>
  function autoScrollNews() {
    const container = document.querySelector('.carousel-container1 .row');
    let scrollAmount = 0;
    const scrollInterval = setInterval(function() {
        if (scrollAmount < container.scrollWidth - container.clientWidth) {
            container.scrollBy({ left: 400, top: 0, behavior: 'smooth' }); 
            scrollAmount += 400;
        } else {
            container.scrollTo({ left: 0, top: 0, behavior: 'smooth' }); 
            scrollAmount = 0;
        }
    }, 5000); 
}

document.addEventListener('DOMContentLoaded', autoScrollNews);

</script>

  <!-- {{-- buat menampilkan detail berita --}} -->
  <script>
      document.getElementById("tampilkanDetail").addEventListener("click", function() {
          document.getElementById("myModal1").style.display = "block";
      });
      document.getElementById("tampilkanDetail2").addEventListener("click", function() {
          document.getElementById("myModal2").style.display = "block";
      });
      document.getElementById("tampilkanDetail3").addEventListener("click", function() {
          document.getElementById("myModal3").style.display = "block";
      });
      
      document.querySelectorAll(".modal .close").forEach(closeButton => {
          closeButton.addEventListener("click", function() {
              const modal = closeButton.closest('.modal');
              modal.style.display = "none";
          });
      });

      window.onclick = function(event) {
          if (event.target.classList.contains("modal")) {
              event.target.style.display = "none";
          }
      };
  </script>

</body>
</html>



