<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @isset($activeMenu)
        <li class="nav-item">
            <a href="{{url('/dashbord')}}" class="nav-link">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @endisset
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Pengajuan Surat</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-email menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('surat-tetap')}}">Warga Tetap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('surat-pindah')}}">Warga Pendatang</a>
                    </li>
                </ul>
            </div>
        </li>    
        @isset($activeMenu)
        <li class="nav-item">
            <a href="#" class="nav-link">
                <span class="menu-title">Bantuan Sosial</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        @endisset
        <li class="nav-item">
            <a href="#" class="nav-link">
                <span class="menu-title">Pengaduan Warga</span>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
        </li>
        @isset($activeMenu)
        <li class="nav-item">
            <a href="#" class="nav-link">
                <span class="menu-title">UMKM Warga</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
        @endisset
    </ul>
</nav>