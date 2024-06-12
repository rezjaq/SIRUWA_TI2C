<style>
    .sidebar.sidebar-hide {
        position: fixed;
        left: -180px;
    }
</style>

<nav class="sidebar " id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('/RT') }}" class="nav-link">

                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'family' ? 'active' : '' }}">
            <a href="{{ url('/family') }}" class="nav-link">
                <span class="menu-title">Keluarga</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'citizen' ? 'active' : '' }}">
            <a href="{{ url('/citizen') }}" class="nav-link">
                <span class="menu-title">Warga</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Warga Pindah' ? 'active' : '' }}">
            <a href="{{ url('/RTWarga_Pindah') }}" class="nav-link">
                <span class="menu-title">Warga Pindah</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'verifikasi' ? 'active' : '' }}">
            <a href="{{ url('/RTVerifikasiWarga') }}" class="nav-link ">
                <span class="menu-title">Verifikasi Data Warga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'verifikasiKeluarga' ? 'active' : '' }}">
            <a href="{{ url('/RTVerifikasiKeluarga') }}" class="nav-link">
                <span class="menu-title">Verifikasi Data Keluarga</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Verifikasi Warga Pindah' ? 'active' : '' }}">
            <a href="{{ url('/RTverifikasiWargaPindah') }}" class="nav-link">
                <span class="menu-title">Verifikasi Warga Pindahan</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ $activeMenu == 'Surat' ? 'active' : '' }}">
            <a href="{{ url('/SuratRT') }}" class="nav-link">
                <span class="menu-title">Surat</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        {{-- <li class="nav-item {{ $activeMenu == 'pengaduan' ? 'active' : '' }}">
            <a href="{{ url('/PengaduanRT') }}" class="nav-link">
                <span class="menu-title">Pengaduan</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li> --}}
    </ul>
</nav>
