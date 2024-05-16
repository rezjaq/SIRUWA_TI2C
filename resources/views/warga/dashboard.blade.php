@extends('layouts.template')
@section('content')
<div class="dashboard-box">
</div>
<br><br>
<h3>Berita Terbaru</h3>
<div class="berita-box">
    <div class="photo">
        <img src="{{asset('asset/images/senam.jpeg')}}" alt="Foto 1">
        <h5>Karnaval</h5>
        <p>Karnaval tahun ini tidak hanya sekadar parade kostum indah, tetapi juga sebuah perayaan keberagaman budaya
            dan kreativitas lokal. </p>
        <button id="lihat-selengkapnya">Lihat Selengkapnya</button>
    </div>
    <div class="photo">
        <img src="{{asset('asset/images/senam.jpeg')}}" alt="Foto 2">
        <h5>Pengajian</h5>
        <p>Kegiatan pengajian ini tidak hanya dilaksanakan diawal Ramadhan namun dilaksanakan secara berkesinambungan
        </p>
        <button id="lihat-selengkapnya">Lihat Selengkapnya</button>
    </div>
    <div class="photo">
        <img src="{{asset('asset/images/senam.jpeg')}}" alt="Foto 3">
        <h5>Kerja Bakti</h5>
        <p>Pada hari Sabtu pagi yang cerah, lebih dari 200 warga berkumpul di lapangan desa untuk mengambil bagian dalam
            kerja bakti.</p>
        <button id="lihat-selengkapnya">Lihat Selengkapnya</button>
    </div>
    <div class="photo">
        <img src="{{asset('asset/images/senam.jpeg')}}" alt="Foto 4">
        <h5>Karnaval</h5>
        <p>Deskripsi Foto 4 disini...</p>
        <button id="lihat-selengkapnya">Lihat Selengkapnya</button>
    </div>
</div>
<br><br>
<h3>Kegiatan Mendatang</h3>
<section id="upcoming-events" class="upcoming-events">
    <div class="container" data-aos="fade-up">
        <div class="carousel-container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('assets/img/senam sehat.jpg')}}" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center py-2"><a href="">Senam Sehat</a></h5>
                            <p class="card-text"><span class="mdi mdi-alarm"></span> <span class="icon-text">06:00 -
                                    selesai</span></p>
                            <p class="card-text"><span class="mdi mdi-calendar-check"></span> <span
                                    class="icon-text">Jumat, 19 April 2024</span></p>
                            <p class="card-text"><span class="mdi mdi-map-marker"></span> <span
                                    class="icon-text">Lapangan Utara</span></p>
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
                            <p class="card-text"><span class="mdi mdi-alarm"></span> <span class="icon-text">06:30 -
                                    selesai</span></p>
                            <p class="card-text"><span class="mdi mdi-calendar-check"></span> <span
                                    class="icon-text">Minggu, 21 April 2024</span></p>
                            <p class="card-text"><span class="mdi mdi-map-marker"></span> <span
                                    class="icon-text">Seluruh Wilayah RW. 02</span></p>
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
                            <p class="card-text"><span class="mdi mdi-alarm"></span> <span class="icon-text">Ba'da
                                    Isya</span></p>
                            <p class="card-text"><span class="mdi mdi-calendar-check"></span> <span
                                    class="icon-text">Jumat, 19 April 2024</span></p>
                            <p class="card-text"><span class="mdi mdi-map-marker"></span> <span class="icon-text">Masjid
                                    Al-Kautsar</span></p>
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
                            <p class="card-text"><span class="mdi mdi-alarm"></span> <span class="icon-text">06:30 -
                                    selesai</span></p>
                            <p class="card-text"><span class="mdi mdi-calendar-check"></span> <span
                                    class="icon-text">Minggu, 21 April 2024</span></p>
                            <p class="card-text"><span class="mdi mdi-map-marker"></span> <span
                                    class="icon-text">Halaman Rumah</span></p>
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
                            <p class="card-text"><span class="mdi mdi-alarm"></span> <span class="icon-text">09:00 -
                                    selesai</span></p>
                            <p class="card-text"><span class="mdi mdi-calendar-check"></span> <span
                                    class="icon-text">Jumat, 19 Mei 2024</span></p>
                            <p class="card-text"><span class="mdi mdi-map-marker"></span> <span class="icon-text">Pos
                                    Posyandu</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<br>
<h3>Peraturan RW 02</h3>
<div class="peraturan-box">
</div>
@endsection
