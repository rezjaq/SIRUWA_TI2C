@extends('layouts.app')

@section('content')
<section class="image-section">
    <img src="{{asset('assets/img/senam sehat.jpg')}}" alt="Gambar Senam Sehat">
</section>

<section class="title-section">
    <h2>Senam Sehat Bersama</h2>
</section>

<section class="schedule-section">
    <div class="schedule-item jam">
        <span class="bi bi-alarm"></span>
        <span class="icon-text">06:00 - selesai</span>
    </div>
    <div class="schedule-item hari">
        <span class="bi bi-calendar-check"></span>
        <span class="icon-text">Jumat, 19 April 2024</span>
    </div>
    <div class="schedule-item tempat">
        <span class="bi bi-geo-alt-fill"></span>
        <span class="icon-text">Lapangan Utara</span>
    </div>
</section>

<section class="details-section">
    <h3>Rincian Kegiatan</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Nullam porttitor, nunc vitae elementum ullamcorper, nunc sapien cursus libero, a dictum sapien nisi vel urna. Maecenas auctor interdum elit sit amet commodo. Nulla facilisi. Sed tristique, nisi ac tincidunt vehicula, nisl tortor auctor nunc, eget euismod sem quam eu tortor. Donec quis leo nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean nec dui vitae purus egestas consectetur.
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Nullam porttitor, nunc vitae elementum ullamcorper, nunc sapien cursus libero, a dictum sapien nisi vel urna. Maecenas auctor interdum elit sit amet commodo. Nulla facilisi. Sed tristique, nisi ac tincidunt vehicula, nisl tortor auctor nunc, eget euismod sem quam eu tortor. Donec quis leo nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean nec dui vitae purus egestas consectetur.
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Nullam porttitor, nunc vitae elementum ullamcorper, nunc sapien cursus libero, a dictum sapien nisi vel urna. Maecenas auctor interdum elit sit amet commodo. Nulla facilisi. Sed tristique, nisi ac tincidunt vehicula, nisl tortor auctor nunc, eget euismod sem quam eu tortor. Donec quis leo nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean nec dui vitae purus egestas consectetur.</p>
</section>
@endsection 

@push('css')
<style>
    .image-section {
        width: 100%;
        height: 40vh;
        overflow: hidden;
        margin-top: 5%;
        position: relative;
    }
    .image-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 15px;
        position: absolute;
        top: 0;
        left: 0;
    }
    .title-section {
        text-align: left;
        margin-top: 1%;
        margin-bottom: 1%;
    }
    .title-section h2 {
        font-size: 2rem;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px;
    }
    .schedule-section {
        display: flex;
        justify-content: space-around;
        border-radius: 10px;
        margin-top: 1%;
        padding: 10px;
    }
    .schedule-item {
        display: flex;
        align-items: center;
    }
    .schedule-item .bi {
        font-size: 1.3rem;
    }
    .schedule-item .icon-text {
        font-size: 1rem;
    }
    .details-section {
        margin-top: 2%;
        border: 2px solid black;
        padding: 20px;
        border-radius: 10px;
    }
    .details-section h3 {
        font-size: 1.3rem;
        font-weight: bold;
    }
    .details-section p {
        font-size: 1rem;
        line-height: 1.5;
    }
</style>
@endpush

@push('js')
<script>
</script>
@endpush
