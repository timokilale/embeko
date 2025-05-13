@extends('layouts.app')

@section('title', 'About Us - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <!-- About Header -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="mb-3">About Embeko Secondary School</h1>
            <p class="lead">
                Embeko Secondary School is a premier educational institution committed to providing quality education with excellence.
            </p>
            <p>
                Founded in 2005, Embeko Secondary School has established itself as one of the leading secondary schools in Tanzania.
                Our school is dedicated to nurturing well-rounded individuals who excel academically and possess strong moral values.
            </p>
            <p>
                At Embeko, we believe in the power of education to transform lives and communities. Our comprehensive approach to education
                ensures that students receive not only academic knowledge but also develop critical thinking skills, creativity, and character.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="about-image">
                <img src="{{ asset('images/school-building.jpg') }}" alt="Embeko Secondary School Building" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="card h-100 border-0 shadow-sm mission-vision-card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Our Mission</h2>
                    <p class="card-text">
                        {{ $schoolInfo->mission ?? 'To provide quality education that develops the intellectual, physical, social, and moral capabilities of our students, preparing them to be responsible citizens and future leaders.' }}
                    </p>
                    <div class="text-center mt-4">
                        <i class="fas fa-bullseye fa-3x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm mission-vision-card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Our Vision</h2>
                    <p class="card-text">
                        {{ $schoolInfo->vision ?? 'To be a center of academic excellence that nurtures innovative, ethical, and globally competitive individuals who contribute positively to society.' }}
                    </p>
                    <div class="text-center mt-4">
                        <i class="fas fa-eye fa-3x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Values -->
    <div class="mb-5">
        <h2 class="text-center mb-4">Our Core Values</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-warning"></i>
                        </div>
                        <h4 class="card-title">Excellence</h4>
                        <p class="card-text">We strive for excellence in all aspects of education and character development.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-balance-scale fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">Integrity</h4>
                        <p class="card-text">We uphold honesty, transparency, and ethical behavior in all our actions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-success"></i>
                        </div>
                        <h4 class="card-title">Respect</h4>
                        <p class="card-text">We foster mutual respect among students, staff, and the wider community.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-lightbulb fa-3x text-info"></i>
                        </div>
                        <h4 class="card-title">Innovation</h4>
                        <p class="card-text">We encourage creative thinking and innovative approaches to learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- School History -->
    <!--<div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="card-title mb-4">Our History</h2>
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <p>
                        Embeko Secondary School was established in 2005 with a vision to provide quality education to students in Tanzania.
                        Starting with just 120 students and 8 teachers, the school has grown significantly over the years.
                    </p>
                    <p>
                        In 2010, the school expanded its facilities to include modern science laboratories, a computer lab, and a library.
                        This expansion was part of our commitment to providing students with the resources they need to excel in their studies.
                    </p>
                    <p>
                        By 2015, Embeko had become one of the top-performing schools in the region, with our students consistently achieving
                        excellent results in national examinations. Our alumni have gone on to pursue successful careers in various fields,
                        including medicine, engineering, law, and business.
                    </p>
                    <p>
                        Today, Embeko Secondary School continues to uphold its tradition of excellence, with a focus on holistic education
                        that prepares students for the challenges of the 21st century.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">2005</div>
                            <div class="timeline-content">
                                <h5>School Established</h5>
                                <p>Embeko Secondary School was founded with 120 students and 8 teachers.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2010</div>
                            <div class="timeline-content">
                                <h5>Facility Expansion</h5>
                                <p>Added science laboratories, computer lab, and library.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2015</div>
                            <div class="timeline-content">
                                <h5>Academic Excellence</h5>
                                <p>Recognized as one of the top-performing schools in the region.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2020</div>
                            <div class="timeline-content">
                                <h5>Digital Transformation</h5>
                                <p>Implemented digital learning platforms and modern teaching methodologies.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">Today</div>
                            <div class="timeline-content">
                                <h5>Continuing Excellence</h5>
                                <p>Committed to providing quality education with a focus on holistic development.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!-- School Leadership -->
    <div class="mb-5">
        <h2 class="text-center mb-4">School Leadership</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm text-center pt-6">
                    <img src="{{ asset('images/principal.jpg') }}" class="card-img-top mt-3" alt="School Principal">
                    <div class="card-body">
                        <h4 class="card-title">Dr. John Doe</h4>
                        <p class="text-muted">Principal</p>
                        <p class="card-text">Dr. John Doe has over 20 years of experience in education and has been leading Embeko Secondary School since 2015.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm text-center pt-6">
                    <img src="{{ asset('images/deputy-principal.jpg') }}" class="card-img-top mt-3" alt="Deputy Principal">
                    <div class="card-body">
                        <h4 class="card-title">Mrs. Jane Smith</h4>
                        <p class="text-muted">Deputy Principal (Academics)</p>
                        <p class="card-text">Mrs. Jane Smith oversees the academic programs and ensures that our students receive quality education.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm text-center pt-6">
                    <img src="{{ asset('images/admin-officer.jpg') }}" class="card-img-top mt-3" alt="Administrative Officer">
                    <div class="card-body">
                        <h4 class="card-title">Mr. David Johnson</h4>
                        <p class="text-muted">Administrative Officer</p>
                        <p class="card-text">Mr. David Johnson manages the day-to-day operations of the school and ensures smooth functioning of all departments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="card bg-primary text-white border-0 shadow">
        <div class="card-body p-5 text-center">
            <h2 class="mb-3">Join the Embeko Family</h2>
            <p class="lead mb-4">
                Discover the Embeko difference and give your child the education they deserve.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('page.show', 'admissions') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-user-plus me-2"></i> Apply Now
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-envelope me-2"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .mission-vision-card {
        border-left: 5px solid #0d6efd !important;
    }
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    .timeline:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background-color: #0d6efd;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }
    .timeline-date {
        position: absolute;
        left: -50px;
        top: 0;
        width: 40px;
        height: 40px;
        background-color: #0d6efd;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    .timeline-content {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
    }
    .timeline-content h5 {
        margin-top: 0;
        color: #0d6efd;
    }
    .timeline-content p {
        margin-bottom: 0;
    }
</style>
@endpush
