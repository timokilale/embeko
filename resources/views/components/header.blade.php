<!-- Desktop header -->
<header id="header" class="bg-white shadow-sm py-3 d-none d-md-block">
    <div class="container-fluid px-4">
        <div class="row align-items-center text-center">
            <!-- Left Logo -->
            <div class="col-md-2">
                <img src="{{ asset('images/kkkt.png') }}" alt="ELCT Logo" class="img-fluid" style="max-height: 80px;">
            </div>

            <!-- School Info -->
            <div class="col-md-8">
                <h2 class="mb-1 text-primary fw-bold" style="font-size: 1.75rem;">ELCT-DODOMA DIOCESE</h2>
                <h2 class="mb-1 text-dark fw-bold" style="font-size: 1.75rem;">EMBEKO SECONDARY SCHOOL</h2>
                <p class="text-muted mb-0">Reg No. S.4506</p>
                <p class="text-secondary fst-italic mb-0">"Education with Excellency"</p>
            </div>

            <!-- Right Logo -->
            <div class="col-md-2">
                <img src="{{ asset('images/logo.png') }}" alt="School Logo" class="img-fluid" style="max-height: 80px;">
            </div>
        </div>
    </div>
</header>

<!-- Mobile header -->
<header id="mobile-header" class="d-md-none py-3 bg-white shadow-sm">
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="School Logo" class="me-3" style="height: 60px;">
            <div>
                <h5 class="mb-1 text-primary fw-bold">EMBEKO SECONDARY SCHOOL</h5>
                <p class="mb-0 text-muted fst-italic">"Education with Excellency"</p>
            </div>
        </div>
    </div>
</header>


<style>
    #header,
    #mobile-header {
        font-family: 'Segoe UI', sans-serif;
    }

    .school-info-content h2 {
        letter-spacing: 0.5px;
    }

    .school-motto,
    .mobile-school-motto {
        font-size: 0.95rem;
    }

</style>
