<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">

            {{-- <a href="{{ url('/RT') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}"> --}}

            <a href="{{ url('/RW') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">

                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/keluarga') }}" class="nav-link {{ ($activeMenu == 'keluarga') ? 'active' : '' }}">
                <span class="menu-title">Keluarga</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/Warga') }}" class="nav-link {{ ($activeMenu == 'Warga') ? 'active' : '' }}">
                <span class="menu-title">warga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/pengumuman') }}" class="nav-link {{ ($activeMenu == 'pengumuman') ? 'active' : '' }}">
                <span class="menu-title">Pengumuman</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/kegiatan') }}" class="nav-link {{ ($activeMenu == 'kegiatan') ? 'active' : '' }}">
                <span class="menu-title">Kegiatan</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/verifikasi') }}" class="nav-link {{ ($activeMenu == 'verifikasi') ? 'active' : '' }}">
                <span class="menu-title">verifikasi</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/verifikasiKeluarga') }}" class="nav-link {{ ($activeMenu == 'verifikasiKeluarga') ? 'active' : '' }}">
                <span class="menu-title">verifikasiKeluarga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/Pengaduann') }}" class="nav-link {{ ($activeMenu == 'Pengaduan') ? 'active' : '' }}">
                <span class="menu-title">Pengaduan</span>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/pengajuan-umkm') }}" class="nav-link {{ ($activeMenu == 'umkm') ? 'active' : '' }}">
                <span class="menu-title">UMKM Warga</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/bansos') }}" class="nav-link {{ ($activeMenu == 'Bansos') ? 'active' : '' }}">
                <span class="menu-title">Bantuan Sosial</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>