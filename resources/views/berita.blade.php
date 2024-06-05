@extends('layouts.app')
@section('content')
<section class="news-section">
    <a href="{{ route('detail-berita') }}" class="card-link">    
    <div class="card">
        <div class="card-content">
            <h2 class="card-title">Berita Terkini</h2>
        </div>
        <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="">
        <div class="card-content">
            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="card-date">2 Juni 2024</p>
        </div>
    </div>
    </a>
    
    <a href="{{ route('detail-berita') }}" class="card-link">
    <div class="card">
        <div class="card-content">
            <h2 class="card-title">Olahraga</h2>
        </div>
        <img src="{{asset('assets/img/berita.JPG')}}" alt="">
        <div class="card-content">
            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="card-date">2 Juni 2024</p>
        </div>
    </div>
    </a>

    <a href="{{ route('detail-berita') }}" class="card-link">
    <div class="card">
        <div class="card-content">
            <h2 class="card-title">Teknologi</h2>
        </div>
        <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="">
        <div class="card-content">
            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="card-date">2 Juni 2024</p>
        </div>
    </div>
    </a>

    <a href="{{ route('detail-berita') }}" class="card-link">
    <div class="card">
        <div class="card-content">
            <h2 class="card-title">Kesehatan</h2>
        </div>
        <img src="{{asset('assets/img/berita.JPG')}}" alt="">
        <div class="card-content">
            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="card-date">2 Juni 2024</p>
        </div>
    </div>
    </a>

    <a href="{{ route('detail-berita') }}" class="card-link">
    <div class="card">
        <div class="card-content">
            <h2 class="card-title">Ekonomi</h2>
        </div>
        <img src="{{asset('assets/img/kerja bakti.jpg')}}" alt="e">
        <div class="card-content">
            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="card-date">2 Juni 2024</p>
        </div>
    </div>
    </a>
</section>
@endsection 

@push('css')
<style>
    .news-section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 5%;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
    }
    .card img {
        width: 100%;
        height: 100%;;
        object-fit: cover;
    }
    .card-content {
        padding: 15px;
        flex-grow: 1;
    }
    .card-title {
        font-size: 1.5em;
        margin: 0 0 10px;
    }
    .card-description {
        margin: 0;
    }
    .card-link {
        text-decoration: none; 
    }
    .card-date {
        font-size: 0.8em;
        color: #666;
        margin-top: 10px;
        text-align: left;
    }
</style>
@endpush

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function truncateText(selector, maxWords) {
            const elements = document.querySelectorAll(selector);
            elements.forEach(el => {
                const words = el.innerText.split(' ');
                if (words.length > maxWords) {
                    el.innerText = words.slice(0, maxWords).join(' ') + ' ...';
                }
            });
        }

        truncateText('.card-description', 30);
    });
</script>
@endpush