<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
    <div class="container-fluid px-4">
        <!-- Mobile Logo -->
        <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Embeko Secondary School" height="40" class="d-inline-block">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav gap-2">
                @php
                    $navItems = [
                        ['route' => 'home', 'icon' => 'home', 'label' => 'Home'],
                        ['route' => 'page.show', 'param' => 'about-us', 'icon' => 'info-circle', 'label' => 'About Us'],
                        ['route' => 'page.show', 'param' => 'admissions', 'icon' => 'file-alt', 'label' => 'How to Apply'],
                        ['route' => 'page.show', 'param' => 'fees', 'icon' => 'money-bill-wave', 'label' => 'Fees Structure'],
                        ['route' => 'results.index', 'icon' => 'chart-bar', 'label' => 'Results', 'match' => 'results.*'],
                        ['route' => 'posts.index', 'icon' => 'newspaper', 'label' => 'News', 'match' => 'posts.*'],
                        ['route' => 'events.index', 'icon' => 'calendar-alt', 'label' => 'Events', 'match' => 'events.*'],
                        ['route' => 'downloads.index', 'icon' => 'download', 'label' => 'Downloads', 'match' => 'downloads.*'],
                        ['route' => 'page.show', 'param' => 'contact-us', 'icon' => 'envelope', 'label' => 'Contact Us'],
                        ['route' => 'gallery.index', 'icon' => 'image', 'label' => 'Our Gallery'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @php
                        $isActive = false;
                        if (isset($item['match'])) {
                            $isActive = request()->routeIs($item['match']);
                        } elseif ($item['route'] === 'page.show' && isset($item['param'])) {
                            $isActive = request()->routeIs('page.show') && request()->route('slug') === $item['param'];
                        } else {
                            $isActive = Route::currentRouteName() === $item['route'];
                        }
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 {{ $isActive ? 'active fw-semibold text-warning' : '' }}"
                           href="{{ isset($item['param']) ? route($item['route'], $item['param']) : route($item['route']) }}">
                            <i class="fas fa-{{ $item['icon'] }} me-1"></i> {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .navbar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 0.375rem;
    }

    .navbar-nav .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 0.375rem;
    }
</style>
