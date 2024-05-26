<section class="breadcrumb-section">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard-warga') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @foreach ($list as $key => $value)
                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                        @if (!$loop->last)
                            <a href="#" class="text-decoration-none text-dark">
                                {{ $value }}
                            </a>
                            <i class="fa fa-angle-right"></i>
                        @else
                            {{ $value }}
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</section>
