@extends('layouts.app')

@section('content')
<section class="title-section">
    <h2>Karnaval Budaya Nusantara Meriahkan Kota</h2>
</section>
<section class="image-section">
    <img src="{{asset('assets/img/berita.JPG')}}" alt="">
    <p class="image-caption">Karnaval Budaya Nusantara di Jalan Utama Kota</p>
</section>
<section class="news-section">
    <p>Ribuan warga memadati jalan utama kota untuk menyaksikan Karnaval Budaya Nusantara yang digelar pada hari Sabtu lalu. Acara tahunan ini menampilkan beragam budaya dari seluruh penjuru Indonesia, dengan peserta yang datang dari berbagai daerah menampilkan tarian, musik, dan kostum tradisional yang memukau.
    </p>
    <p>Karnaval dimulai dari Alun-Alun Kota dan berakhir di Taman Merdeka, menempuh rute sepanjang lima kilometer. Para peserta, mulai dari anak-anak hingga orang dewasa, mengenakan pakaian adat yang penuh warna dan detail. Musik tradisional menggema di sepanjang jalan, menambah semarak suasana.
    </p>
    <p>Walikota, Bapak Joko Santoso, membuka acara dengan pidato singkat yang menekankan pentingnya menjaga dan melestarikan budaya lokal. "Karnaval Budaya Nusantara ini bukan hanya hiburan, tetapi juga pengingat akan kekayaan dan keberagaman budaya yang kita miliki," ujar beliau.
    </p>
    <p>Salah satu peserta, Siti Aminah, yang mewakili Provinsi Aceh, mengaku bangga bisa berpartisipasi dalam karnaval ini. "Ini adalah kesempatan emas untuk memperkenalkan tarian Saman kepada masyarakat luas. Kami berharap budaya Aceh semakin dikenal dan dicintai," kata Siti.
    </p>
    <p>Selain parade budaya, acara ini juga dimeriahkan dengan berbagai stan kuliner yang menyajikan makanan khas dari berbagai daerah. Pengunjung bisa mencicipi sate Madura, rendang Padang, hingga papeda khas Papua. Stan-stan kerajinan tangan juga banyak diminati, menampilkan produk-produk lokal seperti batik, anyaman, dan ukiran kayu.
    </p>
    <p>Acara ini mendapatkan apresiasi yang tinggi dari masyarakat. Rina, seorang pengunjung, mengungkapkan kegembiraannya. "Saya sangat senang dengan acara ini. Anak-anak saya jadi lebih mengenal dan mencintai budaya Indonesia. Semoga tahun depan acaranya bisa lebih meriah lagi," ujarnya.
    </p>
    <p>Karnaval Budaya Nusantara diharapkan dapat menjadi agenda rutin yang mampu menarik wisatawan lokal maupun mancanegara, serta menjadi sarana edukasi bagi generasi muda tentang kekayaan budaya Indonesia. Dengan semakin dikenalnya budaya lokal, diharapkan juga dapat meningkatkan perekonomian daerah melalui sektor pariwisata dan industri kreatif.
    </p>
    <p>Selain hiburan dan edukasi, Karnaval Budaya Nusantara juga memberikan dampak positif terhadap perekonomian lokal. Banyak pedagang yang mengaku pendapatan mereka meningkat drastis selama acara berlangsung. "Ini adalah momen yang baik bagi kami para pedagang untuk memperkenalkan produk kami kepada pasar yang lebih luas," ungkap Budi, seorang pedagang batik.
    </p>
    <p>Tak hanya itu, karnaval ini juga mengundang perhatian media nasional dan internasional, yang meliput kegiatan tersebut secara luas. Liputan media ini diharapkan dapat meningkatkan eksposur kota sebagai destinasi wisata budaya yang menarik.
    </p>
    <p>Secara keseluruhan, Karnaval Budaya Nusantara menjadi bukti nyata bagaimana kekayaan budaya Indonesia bisa menjadi daya tarik yang kuat. Masyarakat berharap agar pemerintah terus mendukung dan memfasilitasi acara-acara serupa di masa mendatang.</p>
</section>
<section class="author-section">
    <p>Tim Pers RW.02 Candirenggo<br>30 Mei 2024</p>
</section>
@endsection 

@push('css')
<style>
    .title-section {
        margin-top: 5%;
        text-align: center;
    }

    .title-section h2 {
        font-weight: bold;
        font-size: 2em;
    }

    .image-section {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-section img {
        width: 80%;
        height: 60vh;
        overflow: hidden;
        margin-top: 1%;
        margin-bottom: 0.5%;
    }

    .image-caption {
        color: gray;
        text-align: center;
        margin-top: 0.5em;
        font-size: 0.9em;
        font-style: italic;
    }

    .news-section {
        text-align: justify;
        padding: 0 10%;
    }

    .author-section {
        color: gray;
        text-align: right;
        margin-top: 2em;
        padding: 0 10%;
        font-size: 0.9em;
        font-style: italic;
    }
</style>
@endpush

@push('js')
<script>
</script>
@endpush
