<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('/RW') }}" class="nav-link ">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Data RT' ? 'active' : '' }}">
            <a href="{{ url('/DataRT') }}" class="nav-link">
                <span class="menu-title">Data RT</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'keluarga' ? 'active' : '' }}">
            <a href="{{ url('/keluarga') }}" class="nav-link">
                <span class="menu-title">Keluarga</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Warga' ? 'active' : '' }}">
            <a href="{{ url('/Warga') }}" class="nav-link ">
                <span class="menu-title">Warga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Warga Pindah' ? 'active' : '' }}">
            <a href="{{ url('/Warga_Pindah') }}" class="nav-link">
                <span class="menu-title">Warga Pindah</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'pengumuman' ? 'active' : '' }}">
            <a href="{{ url('/pengumuman') }}" class="nav-link">
                <span class="menu-title">Pengumuman</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'kegiatan' ? 'active' : '' }}">
            <a href="{{ url('/kegiatan') }}" class="nav-link">
                <span class="menu-title">Kegiatan</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'verifikasi' ? 'active' : '' }}">
            <a href="{{ url('/verifikasi') }}" class="nav-link">
                <span class="menu-title">Verifikasi</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'verifikasiKeluarga' ? 'active' : '' }}">
            <a href="{{ url('/verifikasiKeluarga') }}" class="nav-link">
                <span class="menu-title">Verifikasi Keluarga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Verifikasi Warga Pindah' ? 'active' : '' }}">
            <a href="{{ url('/verifikasiWargaPindah') }}" class="nav-link">
                <span class="menu-title">Verifikasi Warga Pindah</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'pengaduan' ? 'active' : '' }}">
            <a href="{{ url('/Pengaduann') }}" class="nav-link">
                <span class="menu-title">Pengaduan</span>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'pengajuan' ? 'active' : '' }}">
            <a href="{{ url('/pengajuan-umkm') }}" class="nav-link">
                <span class="menu-title">UMKM Warga</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Surat' ? 'active' : '' }}">
            <a href="{{ url('/SuratRW') }}" class="nav-link">
                <span class="menu-title">Surat</span>
                <i class="mdi mdi-mail menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Bansos' ? 'active' : '' }}">
            <a href="{{ url('/bansos') }}" class="nav-link">
                <span class="menu-title">Bantuan Sosial</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
