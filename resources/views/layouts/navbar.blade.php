{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark py-2 fixed-top" segmen>
    <div class="container">
        <a class="navbar-brand" href="#">
            <!-- Logo -->
            <img src="{{ asset('assets/img/siruwa.jpg') }}" height="55" width="55" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard-warga') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pengajuan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pengajuanDropdown">
                        <li><a class="dropdown-item" href="#">Warga Pindahan</a></li>
                        <li><a class="dropdown-item" href="#">Warga Asli</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bansosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bansos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bansosDropdown">
                        <li><a class="dropdown-item" href="#">Jenis Bansos</a></li>
                        <li><a class="dropdown-item" href="#">Pengajuan</a></li>
                        <li><a class="dropdown-item" href="#">Daftar Penerima Bansos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Denah Rumah Warga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengaduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">UMKM</a>
                </li>
            </ul>
            @auth
                <div class="d-flex">
                    <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                </div>
            @else
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
{{-- navbar --}}
