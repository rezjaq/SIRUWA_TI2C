@extends('layouts.app')

@section('content')
<section>
    <!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container-fluid">

    <div class="row">
      <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
        <!-- Tambahkan video atau gambar terkait di sini -->
      </div>

      <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
        <h3>Bantuan Langsung Tunai Dana Desa (BLTDD)</h3>
        <p>Program BLT DD adalah inisiatif pemerintah untuk memberikan bantuan dana tunai kepada keluarga yang memenuhi syarat berdasarkan keputusan musyawarah desa (Musdes). Program ini dirancang untuk meringankan beban ekonomi keluarga penerima manfaat (KPM) sesuai dengan peraturan perundang-undangan yang berlaku.</p>

        <div class="icon-box">
          <div class="icon"><i class="bi bi-bullseye"></i></div>
          <h4 class="title"><a href="#tujuan">Tujuan</a></h4>
          <p class="description">Tujuan utama BLT DD adalah membantu keluarga kurang mampu memenuhi kebutuhan sehari-hari, terutama bagi yang terdampak pandemi COVID-19.</p>
        </div>

        <div class="icon-box">
          <div class="icon"><i class="bi bi-cash"></i></i></div>
          <h4 class="title"><a href="#besaran-bantuan">Besaran Bantuan</a></h4>
          <p class="description">Setiap Keluarga Penerima Manfaat (KPM) akan menerima bantuan sebesar Rp300.000,00 per bulan.</p>
        </div>

        <div class="icon-box">
          <div class="icon"><i class="bi bi-arrow-left-right"></i></div>
          <h4 class="title"><a href="#penyaluran-bantuan">Penyaluran Bantuan</a></h4>
          <p class="description">Bantuan disalurkan secara tunai di Kantor Kelurahan Candirenggo untuk memastikan bantuan tepat sasaran.</p>
        </div>

        <div class="text-left mt-4">
          <a href="{{ route('warga.bansos.create') }}" class="btn-ajukan">Ajukan</a>
        </div>

      </div>
    </div>

  </div>
</section><!-- End About Section -->


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">
        <div class="row justify-content-center"> <!-- Menggunakan justify-content-center untuk menengahkan row -->
          <div class="col-lg-3 col-md-6">
            <div class="count-box rupiah">
              <i class="fas fa-coins"></i>
              <span class="counter">0</span>
              <p>Ribu Rupiah</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="count-box penerima">
              <i class="fas fa-user"></i>
              <span class="counter">1</span>
              <p>Penerima</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="count-box target">
              <i class="fas fa-file-alt"></i>
              <span class="counter">2</span>
              <p>Pengajuan</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Syarat Penerima</h2>
        </div>
    
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-home"></i></div>
              <h4><a href="">Keluarga Kurang Mampu</a></h4>
              <p>Keluarga miskin yang tercatat dalam Data Terpadu Kesejahteraan Sosial (DTKS) atau yang tidak tercatat (exclusion error)</p>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Tidak Menerima Bantuan Lain</a></h4>
              <p>Tidak menerima bantuan Program Keluarga Harapan (PKH) atau Bantuan Sembako.</p>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-briefcase"></i></div>
              <h4><a href="">Kehilangan Pekerjaan</a></h4>
              <p>Terkena kehilangan pekerjaan dan tidak memiliki tabungan yang mencukupi untuk memenuhi kebutuhan hidup selama tiga bulan ke depan.</p>
            </div>
          </div>
        </div>
    
        <div class="row justify-content-center mt-4">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-viruses"></i></div>
              <h4><a href="">Penyakit Kronis</a></h4>
              <p>Memiliki anggota keluarga yang rentan terkena penyakit kronis atau berkepanjangan.</p>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a href="">Lansia dan Disabilitas</a></h4>
              <p>Keluarga yang memiliki anggota yang merupakan lansia atau penyandang disabilitas yang tinggal sendiri.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Pertanyaan Umum</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apakah penerima bansos lain dapat menerima bansos ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Penerima bansos lain tidak boleh menerima bansos ini, penerima bansos hanya berhak mendapatkan 1 bansos.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Berapa kuota penerima bansos ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Setiap RW diberi kuota 15 keluarga penerima.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara mengajukan bantuan sosial ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Silahkan klik pada menu pengajuan dan isikan data yang sesuai.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Berapa lama proses penentuan penerima bansos ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Estimasi 1 minggu setelah pendaftaran ditutup.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Setelah disetujui sebagai penerima, kapan bantuannya akan diterima? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Hal tersebut berkaitan dengan kebijakan kelurahan, kemungkinan 1 minggu setelah pengumuman penerima.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

</section>
@endsection 

@push('css')
    <style>
/* General */
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
}

a {
  color: #2CA36C;
  text-decoration: none;
}

a:hover {
  color: #52795e;
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", sans-serif;
}

/* Preloader */
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #227D54;
  border-top-color: #d1e6f9;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1s linear infinite;
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/* Back to top button */
.back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #227D54;
  width: 40px;
  height: 40px;
  border-radius: 4px;
  transition: all 0.4s;
}

.back-to-top i {
  font-size: 28px;
  color: #fff;
  line-height: 0;
}

.back-to-top:hover {
  background: #298ce5;
  color: #fff;
}

.back-to-top.active {
  visibility: visible;
  opacity: 1;
}

.datepicker-dropdown {
  padding: 20px !important;
}

/* Sections General */
section {
  padding: 20px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #ECF6F2;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
  color: #2c4964;
}

.section-title h2::before {
  content: "";
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #227D54;
  bottom: 0;
  left: calc(50% - 20px);
}

.section-title p {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# Button Ajukan
--------------------------------------------------------------*/
.btn-ajukan {
  display: inline-block;
  padding: 10px 25px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  background-color: #227D54;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  text-align: left;
  margin-top: 20px;
}

.btn-ajukan:hover {
  background-color: #195c3b;
  text-decoration: none;
}

@media (max-width: 768px) {
  .btn-ajukan {
    font-size: 14px;
    padding: 8px 20px;
  }
}

/* About */
.about .icon-boxes h4 {
  font-size: 18px;
  color: #4b7dab;
  margin-bottom: 15px;
}

.about .icon-boxes h3 {
  font-size: 28px;
  font-weight: 700;
  color: #2c4964;
  margin-bottom: 15px;
}

.about .icon-box {
  margin-top: 40px;
}

.about .icon-box .icon {
  float: left;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 64px;
  height: 64px;
  border: 2px solid #D4E7C5;
  border-radius: 50px;
  transition: 0.5s;
}

.about .icon-box .icon i {
  color: #227D54;
  font-size: 32px;
}

.about .icon-box:hover .icon {
  background: #227D54;
  border-color: #D4E7C5;
}

.about .icon-box:hover .icon i {
  color: #D4E7C5;
}

.about .icon-box .title {
  margin-left: 85px;
  font-weight: 700;
  margin-bottom: 10px;
  font-size: 18px;
}

.about .icon-box .title a {
  color: #343a40;
  transition: 0.3s;
}

.about .icon-box .title a:hover {
  color: #227D54;
}

.about .icon-box .description {
  margin-left: 85px;
  line-height: 24px;
  font-size: 14px;
}

.about .video-box {
  background: url('{{ asset('assets/img/heroBg.jpg') }}') center center no-repeat;
  background-size: cover;
  min-height: 500px;
}


.about .play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(#227D54 50%, rgba(25, 119, 204, 0.4) 52%);
  border-radius: 50%;
  display: block;
  position: absolute;
  left: calc(50% - 47px);
  top: calc(50% - 47px);
  overflow: hidden;
}

.about .play-btn::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.about .play-btn::before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  animation-delay: 0s;
  animation: pulsate-btn 2s;
  animation-direction: forwards;
  animation-iteration-count: infinite;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid rgba(25, 119, 204, 0.7);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

.about .play-btn:hover::after {
  border-left: 15px solid #227D54;
  transform: scale(20);
}

.about .play-btn:hover::before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  animation: none;
  border-radius: 0;
}

@keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

/* Counts */
.counts {
  background: #ECF6F2;
  padding: 70px 0 60px;
}

.counts .count-box {
  padding: 30px 30px 25px 30px;
  width: 100%;
  position: relative;
  text-align: center;
  background: #fff;
}

.counts .count-box i {
  position: absolute;
  top: -25px;
  left: 50%;
  transform: translateX(-50%);
  font-size: 20px;
  background: #227D54;
  color: #fff;
  border-radius: 50px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
}

.counts .count-box span {
  font-size: 36px;
  display: block;
  font-weight: 600;
  color: #082744;
}

.counts .count-box p {
  padding: 0;
  margin: 0;
  font-size: 14px;
}

/* Services Section */
.services .icon-box {
  text-align: center;
  border: 1px solid #d5e1ed;
  padding: 80px 20px;
  transition: all ease-in-out 0.3s;
}

.services .icon-box .icon {
  margin: 0 auto;
  width: 64px;
  height: 64px;
  background: #227D54;
  border-radius: 5px;
  transition: all 0.3s ease-out 0s;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  transform-style: preserve-3d;
  position: relative;
  z-index: 2;
}

.services .icon-box .icon i {
  color: #fff;
  font-size: 28px;
  transition: ease-in-out 0.3s;
}

.services .icon-box .icon::before {
  position: absolute;
  content: "";
  left: -8px;
  top: -8px;
  height: 100%;
  width: 100%;
  background: #D4E7C5;
  border-radius: 5px;
  transition: all 0.3s ease-out 0s;
  transform: translateZ(-1px);
  z-index: -1;
}

.services .icon-box h4 {
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 24px;
}

.services .icon-box h4 a {
  color: #2c4964;
}

.services .icon-box p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.services .icon-box:hover {
  background: #227D54;
  border-color: #227D54;
}

.services .icon-box:hover .icon {
  background: #fff;
}

.services .icon-box:hover .icon i {
  color: #227D54;
}

.services .icon-box:hover .icon::before {
  background: rgba(255, 255, 255, 0.3);
}

.services .icon-box:hover h4 a,
.services .icon-box:hover p {
  color: #fff;
}

/* Frequently Asked Questions */
.faq .faq-list {
  padding: 0 100px;
}

.faq .faq-list ul {
  padding: 0;
  list-style: none;
}

.faq .faq-list li+li {
  margin-top: 15px;
}

.faq .faq-list li {
  padding: 20px;
  background: #fff;
  border-radius: 4px;
  position: relative;
}

.faq .faq-list a {
  display: block;
  position: relative;
  font-size: 16px;
  line-height: 24px;
  font-weight: 500;
  padding: 0 30px;
  outline: none;
  cursor: pointer;
}

.faq .faq-list .icon-help {
  font-size: 24px;
  position: absolute;
  right: 0;
  left: 20px;
  color: #227D54;
}

.faq .faq-list .icon-show,
.faq .faq-list .icon-close {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 0;
}

.faq .faq-list p {
  margin-bottom: 0;
  padding: 10px 0 0 0;
}

.faq .faq-list .icon-show {
  display: none;
}

.faq .faq-list a.collapsed {
  color: #343a40;
}

.faq .faq-list a.collapsed:hover {
  color: #227D54;
}

.faq .faq-list a.collapsed .icon-show {
  display: inline-block;
}

.faq .faq-list a.collapsed .icon-close {
  display: none;
}

@media (max-width: 1200px) {
  .faq .faq-list {
    padding: 0;
  }
}

@media (max-width: 992px) {
  .section-title h2 {
    font-size: 28px;
  }

  .about .icon-boxes h4,
  .about .icon-boxes h3 {
    text-align: center;
  }

  .about .icon-box .title,
  .about .icon-box .description {
    margin-left: 0;
    text-align: center;
  }
}

@media (max-width: 768px) {
  .services .icon-box {
    padding: 60px 15px;
  }

  .counts .count-box {
    padding: 20px 15px;
  }

  .faq .faq-list a {
    padding: 0 20px;
  }

  .faq .faq-list .icon-help {
    left: 15px;
  }
}

@media (max-width: 576px) {
  .section-title h2 {
    font-size: 24px;
  }

  .counts .count-box {
    padding: 15px 10px;
  }

  .faq .faq-list a {
    padding: 0 15px;
  }
}


    </style>
@endpush

@push('js')
<script>
  function animateValues(classNames, starts, ends, duration) {
    for (var i = 0; i < classNames.length; i++) {
      animateValue(classNames[i], starts[i], ends[i], duration);
    }
  }

  function animateValue(className, start, end, duration) {
    var obj = document.querySelector("." + className + " .counter");
    var range = end - start;
    var current = start;
    var increment = end > start ? 1 : -1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var timer = setInterval(function() {
      current += increment;
      obj.textContent = current;
      if (current == end) {
        clearInterval(timer);
      }
    }, stepTime);
  }

  // Panggil fungsi animateValues dengan parameter yang sesuai
  animateValues(["rupiah", "penerima", "target"], [0, 1, 2], [300, 21, 50], 1000); // Contoh untuk tiga elemen dengan nilai yang berbeda
</script>
@endpush