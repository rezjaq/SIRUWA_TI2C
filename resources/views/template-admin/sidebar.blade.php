<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/keluarga') }}" class="nav-link {{ ($activeMenu == 'keluarga') ? 'active' : '' }}">
                <span class="menu-title">keluarga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/warga') }}" class="nav-link {{ ($activeMenu == 'warga') ? 'active' : '' }}">
                <span class="menu-title">warga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/pengumuman') }}" class="nav-link {{ ($activeMenu == 'pengumuman') ? 'active' : '' }}">
                <span class="menu-title">Pengumuman</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/kegiatan') }}" class="nav-link {{ ($activeMenu == 'kegiatan') ? 'active' : '' }}">
                <span class="menu-title">Kegiatan</span>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/umkm') }}" class="nav-link {{ ($activeMenu == 'umkm') ? 'active' : '' }}">
                <span class="menu-title">UMKM Warga</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
