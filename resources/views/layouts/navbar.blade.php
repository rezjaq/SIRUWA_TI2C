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
                            Pengajuan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pengajuanDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga-tetap') }}">Surat Warga Tetap</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga-pindah') }}">Surat Warga Pindahan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataWargaDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Data Warga
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataWargaDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga.Warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.keluarga.index') }}">Data Keluarga</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::routeIs('bansos.*') ? 'active' : '' }}" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bansos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="{{ route('jenis-bansos') }}">Jenis Bansos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengajuan-bansos') }}">Pengajuan</a></li>
                            <li><a class="dropdown-item" href="{{ route('daftar-penerima-bansos') }}">Daftar Penerima Bansos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('denah-rumah') ? 'active' : '' }}" href="{{ route('denah-rumah') }}">Denah Rumah Warga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}">Pengaduan</a>
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