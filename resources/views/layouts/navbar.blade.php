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
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('warga-tetap') ? 'active' : '' }}" aria-current="page" href="{{ route('warga-tetap') }}">Surat</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " {{ Request::routeIs('warga.Warga.index') || Request::routeIs('warga.keluarga.index') ? 'active' : '' }}" href="#" id="dataWargaDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pengecekan Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataWargaDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga.Warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.keluarga.index') }}">Data Keluarga</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  {{ Request::routeIs('bansos.*') ? 'active' : '' }}" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bantuan Sosial
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="{{ route('warga.bansos.create') }}">Pengajuan</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.bansos.penerima') }}">Daftar Penerima Bansos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  {{ Request::routeIs('pengaduan.*') ? 'active' : '' }}" href="#" id="pengaduanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pengaduan Warga</a>
                        <ul class="dropdown-menu" aria-labelledby="pengaduanDropdown">
                            <li><a class="dropdown-item {{ Request::routeIs('pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}">Ajukan Pengaduan</a></li>
                            <li><a class="dropdown-item {{ Request::routeIs('pengaduan.history') ? 'active' : '' }}" href="{{ route('pengaduan.history') }}">List Pengaduan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  {{ Request::routeIs('pengajuan-umkm*') ? 'active' : '' }}" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            UMKM
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                            <li><a class="dropdown-item" href="{{ route('umkm.show') }}">Status Pengajuan</a></li>
                            <li><a class="dropdown-item" href="{{ route('umkm') }}">Macam Macam UMKM</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengajuan-umkm.create') }}">Pengajuan UMKM</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="{{ route('logout') }}" class="btn btn-custom me-3">Logout</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wargaPindah.create') }}">Warga Pindahan</a>
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