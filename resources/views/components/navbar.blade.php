<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #FFD700;">
    <div class="container-fluid">
        <!-- Add a brand/logo for mobile view -->
        <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Embeko Secondary School" height="40" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto d-flex flex-row flex-wrap justify-content-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('page.show', 'about-us') }}">
                        <i class="fas fa-info-circle me-1"></i> About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admissions') ? 'active' : '' }}" href="{{ route('page.show', 'admissions') }}">
                        <i class="fas fa-file-alt me-1"></i> How to Apply
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('fees') ? 'active' : '' }}" href="{{ route('page.show', 'fees') }}">
                        <i class="fas fa-money-bill-wave me-1"></i> Fees Structure
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('results.*') ? 'active' : '' }}" href="{{ route('results.index') }}">
                        <i class="fas fa-chart-bar me-1"></i> Results
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                        <i class="fas fa-newspaper me-1"></i> News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}" href="{{ route('events.index') }}">
                        <i class="fas fa-calendar-alt me-1"></i> Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('downloads.*') ? 'active' : '' }}" href="{{ route('downloads.index') }}">
                        <i class="fas fa-download me-1"></i> Downloads
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ route('page.show', 'contact-us') }}">
                        <i class="fas fa-envelope me-1"></i> Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
