<!-- Desktop header -->
<header id="header" class="text-black justify-content-center py-5 d-none d-md-block header-height">
    <div class="carousel-container">
        @include('components.carousel')
    </div>
    <div class="header-overlay"></div>
    <div class="container-fluid position-relative">
        <div class="row align-items-center px-md-5 px-lg-5">
            <div class="col-md-3 col-lg-2 text-center logo-div">
                <img src="{{ asset('images/kkkt.png') }}" alt="ELCT Logo" class="img-fluid logo-img" />
            </div>
            <div class="col-md-6 col-lg-8 text-center text-dark school-info-container border-0">
                <div class="school-info-background">
                    <h2 class="school-title mb-2">ELCT DODOMA DIOCESE</h2>
                    <h2 class="school-title mb-3">EMBEKO SECONDARY SCHOOL</h2>
                    <p class="reg-number mb-1">Reg No. S.4506</p>
                    <p class="school-motto">Education with excellency</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-2 text-center logo-div">
                <img src="{{ asset('images/logo.png') }}" alt="School Logo" class="img-fluid logo-img" />
            </div>
        </div>
    </div>
</header>

<!-- Mobile header -->
<header id="mobile-header" class="d-md-none py-3 bg-light">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo.png') }}" alt="School Logo" class="mobile-logo me-3" />
            <div class="text-center">
                <h1 class="mobile-school-title">EMBEKO SECONDARY SCHOOL</h1>
                <p class="mobile-school-motto mb-0">Education with excellency</p>
            </div>
        </div>
    </div>
</header>
