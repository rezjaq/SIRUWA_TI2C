<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">

            {{-- <a href="{{ url('/RT') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}"> --}}

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
                <span class="menu-title">warga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/RTVerifikasiWarga') }}" class="nav-link {{ ($activeMenu == 'verifikasi') ? 'active' : '' }}">
                <span class="menu-title">verifikasi</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/RTVerifikasiKeluarga') }}" class="nav-link {{ ($activeMenu == 'verifikasiKeluarga') ? 'active' : '' }}">
                <span class="menu-title">verifikasiKeluarga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/RTVerifikasiKeluarga') }}" class="nav-link {{ ($activeMenu == 'pengaduan') ? 'active' : '' }}">
                <span class="menu-title">Pengaduan</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>