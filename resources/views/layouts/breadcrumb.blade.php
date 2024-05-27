<section class="breadcrumb-section">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard-warga') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @foreach ($list as $key => $item)
                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                        @if (!$loop->last)
                            @if(isset($item['dropdown']) && $item['dropdown'])
                                <div class="dropdown">
                                    <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="breadcrumbDropdown{{ $key }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $item['label'] }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="breadcrumbDropdown{{ $key }}">
                                        @foreach($item['links'] as $link)
                                            <a class="dropdown-item" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ $item['url'] }}" class="text-decoration-none text-dark">
                                    {{ $item['label'] }}
                                </a>
                            @endif
                        @else
                            {{ $item['label'] }}
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</section>