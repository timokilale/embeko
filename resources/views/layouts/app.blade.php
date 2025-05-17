<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Embeko Secondary School')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        #header{
            background-image: url("{{asset('images/nav.jpg')}}");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .nav-item {
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .d-flex {
            display: flex;
        }
        .flex-column {
            flex-direction: column;
        }
        .min-vh-100 {
            min-height: 100vh;
        }
        .flex-grow-1 {
            flex-grow: 1;
        }
    </style>
    @stack('styles')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2L6WXL8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="d-flex flex-column min-vh-100">
        <div class="container-fluid flex-grow-1 p-0">
            <!-- Header -->
            <nav class="navbar navbar-dark bg-dark text-white p-0 sticky-top d-none d-md-flex">
                <div class="container-fluid justify-content-center">
                    <ul class="nav py-1">
                        <li class="nav-item mx-4">
                            Email: support@embeko.ac.tz
                        </li>
                        <li class="nav-item mx-4">
                            <i class="fa fa-phone-square-alt"></i>
                            TEL: +255 764 581 739 / +255 786 853 890
                        </li>
                        <li class="nav-item mx-4">
                            <i class="fa fa-map-marker"></i>
                            Kondoa Mjini, Karibu na Benki ya CRDB Kondoa.
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- School header (only visible on md+ screens) -->
            <header class="bg-light text-black py-3 d-none d-md-block" id="header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Left logo -->
                        <div class="col-md-2 text-center">
                            <img src="{{asset('images/kkkt.png')}}" alt="school logo left" class="img-fluid w-50" />
                        </div>

                        <!-- Centered school name and motto -->
                        <div class="col-md-8 text-center">
                            <h2 class="display-6 fw-bold mb-1">ELCT DODOMA DIOCESE</h2>
                            <h2 class="display-6 fw-bold mb-1">EMBEKO SECONDARY SCHOOL</h2>
                            <p class="fw-bold mb-0">Reg No. S.4506</p>
                            <small class="fst-italic">"Education with excellency"</small>
                        </div>

                        <!-- Right logo -->
                        <div class="col-md-2 text-center">
                            <img src="{{asset('images/logo.png')}}" alt="school logo right" class="img-fluid w-50" />
                        </div>
                    </div>
                </div>
            </header>

            <!-- Navbar -->
            @include('components.navbar')

            <!-- Carousel Section -->
            <div class="carousel-section d-none d-md-block">
                @include('components.carousel')
            </div>

            <!-- Main Content -->
            <main id="app">
                <div class="container-fluid mt-3">
                    @include('components.flash-message')
                </div>
                @yield('content')
            </main>

            <!-- Footer -->
            @include('components.footer')
            @if (!request()->cookie('cookie_consent'))
                <div class="cookie-consent alert alert-dark position-fixed bottom-0 start-0 w-100 z-index-1050 text-center">
                    <div class="container py-3">
                        <p class="mb-2">We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.</p>
                        <button class="btn btn-primary btn-sm" onclick="acceptCookies()">Accept</button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Confirmation Modal -->
    @include('components.confirmation-modal')

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Confirmation Dialog JS -->
    <script src="{{ asset('js/confirmation.js') }}"></script>

    @stack('scripts')
    <script>
        function acceptCookies() {
            fetch("{{ route('cookie.accept') }}")
                .then(() => {
                    document.querySelector('.cookie-consent').remove();
                });
        }
    </script>

    @if (request()->cookie('cookie_consent'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
{{--        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>--}}
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'GA_MEASUREMENT_ID', {
                anonymize_ip: true,       // GDPR-friendly
                page_path: window.location.pathname
            });
        </script>
    @endif
</body>
</html>
