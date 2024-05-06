<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link {{($activeMenu == 'dashboard')? 'active' : ''}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#collapsePengajuanSurat" aria-expanded="false" aria-controls="collapsePengajuanSurat">
                <span class="menu-title">Pengajuan Surat</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-email menu-icon"></i>
            </a>
            <div class="collapse" id="collapsePengajuanSurat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ ($activeMenu == 'warga_tetap') ? 'active' : '' }}" href="{{ route('warga-tetap') }}">Warga Tetap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($activeMenu == 'warga_pindah') ? 'active' : '' }}" href="{{ route('warga-pindah') }}">Warga Pendatang</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="{{url('/bansos')}}" class="nav-link {{($activeMenu == 'bantuan_sosial')? 'active' : ''}}">
                <span class="menu-title">Bantuan Sosial</span>
                <i class="mdi mdi-credit-card-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/pengaduan_warga')}}" class="nav-link {{($activeMenu == 'pengaduan_warga')? 'active' : ''}}">
                <span class="menu-title">Pengaduan Warga</span>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/umkm')}}" class="nav-link {{($activeMenu == 'umkm')? 'active' : ''}}">
                <span class="menu-title">UMKM Warga</span>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>