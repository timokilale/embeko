<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Embeko Secondary School')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <div class="container-fluid flex-grow-1 p-0">
            <!-- Header -->
            @include('components.header')

            <!-- Navbar -->
            @include('components.navbar')

            <!-- Carousel Section -->
            <div class="carousel-section d-none d-md-block">
                @include('components.carousel')
            </div>

            <!-- Main Content -->
            <main>
                <div class="container mt-3">
                    @include('components.flash-message')
                </div>
                @yield('content')
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <!-- Confirmation Modal -->
    @include('components.confirmation-modal')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Confirmation Dialog JS -->
    <script src="{{ asset('js/confirmation.js') }}"></script>

    @stack('scripts')
</body>
</html>
