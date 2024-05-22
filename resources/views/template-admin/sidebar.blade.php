<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ url('/RT') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/family') }}" class="nav-link {{ ($activeMenu == 'family') ? 'active' : '' }}">
                <span class="menu-title">Keluarga</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/citizen') }}" class="nav-link {{ ($activeMenu == 'citizen') ? 'active' : '' }}">
                <span class="menu-title">Warga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/announcement') }}" class="nav-link {{ ($activeMenu == 'announcement') ? 'active' : '' }}">
                <span class="menu-title">Pengumuman</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/activity') }}" class="nav-link {{ ($activeMenu == 'activity') ? 'active' : '' }}">
                <span class="menu-title">Kegiatan</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/complaint') }}" class="nav-link {{ ($activeMenu == 'complaint') ? 'active' : '' }}">
                <span class="menu-title">Pengaduan</span>
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
