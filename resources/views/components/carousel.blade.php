<div id="carouselExampleFade" class="carousel slide carousel-fade d-none d-md-block" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/carousel/1.jpg') }}" class="d-block w-100 carousel-img" alt="School Image 1">
            <div class="carousel-buttons">
                <a href="{{ route('apply') }}" class="btn btn-primary me-2">Apply Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Us</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel/2.jpg') }}" class="d-block w-100 carousel-img" alt="School Image 2">
            <div class="carousel-buttons">
                <a href="{{ route('apply') }}" class="btn btn-primary me-2">Apply Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Us</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel/3.jpg') }}" class="d-block w-100 carousel-img" alt="School Image 3">
            <div class="carousel-buttons">
                <a href="{{ route('apply') }}" class="btn btn-primary me-2">Apply Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Us</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
