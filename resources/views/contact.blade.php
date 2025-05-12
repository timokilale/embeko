@extends('layouts.app')

@section('title', 'Contact Us - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Contact Us</h1>
    
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100 contact-info-card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Get in Touch</h2>
                    <p class="lead mb-4">
                        We'd love to hear from you! Please feel free to contact us with any questions or inquiries.
                    </p>
                    
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Address</h5>
                            <p class="mb-0">{{ $schoolInfo->address ?? 'P.O. Box 1234, Dodoma, Tanzania' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-phone fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Phone</h5>
                            <p class="mb-0">{{ $schoolInfo->phone ?? '+255 123 456 789' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Email</h5>
                            <p class="mb-0">{{ $schoolInfo->email ?? 'info@embeko.ac.tz' }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Office Hours</h5>
                            <p class="mb-0">Monday - Friday: 8:00 AM - 4:00 PM<br>Saturday: 8:00 AM - 12:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h5>Connect With Us</h5>
                        <div class="social-icons">
                            @if(isset($schoolInfo->facebook))
                                <a href="{{ $schoolInfo->facebook }}" class="btn btn-outline-primary me-2" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            
                            @if(isset($schoolInfo->twitter))
                                <a href="{{ $schoolInfo->twitter }}" class="btn btn-outline-info me-2" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            
                            @if(isset($schoolInfo->instagram))
                                <a href="{{ $schoolInfo->instagram }}" class="btn btn-outline-danger me-2" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            
                            @if(isset($schoolInfo->youtube))
                                <a href="{{ $schoolInfo->youtube }}" class="btn btn-outline-danger me-2" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                            
                            @if(isset($schoolInfo->linkedin))
                                <a href="{{ $schoolInfo->linkedin }}" class="btn btn-outline-primary" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="card-title mb-4">Send Us a Message</h2>
                    
                    <form action="#" method="POST" class="contact-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="" selected disabled>Select a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Admissions">Admissions</option>
                                <option value="Academic Programs">Academic Programs</option>
                                <option value="Fees and Payments">Fees and Payments</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="card-title mb-4">Our Location</h2>
            @include('components.maps')
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Frequently Asked Questions</h2>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What are the school hours?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Our school hours are from 7:30 AM to 3:30 PM, Monday through Friday. Students are expected to arrive by 7:15 AM for morning assembly.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How can I apply for admission?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>To apply for admission, you can visit our <a href= "/admissions">Admissions page</a> for detailed information about the application process. You can also contact our admissions office directly at admissions@embeko.ac.tz or call +255 123 456 789.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What extracurricular activities do you offer?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>We offer a wide range of extracurricular activities including sports (football, basketball, volleyball, athletics), clubs (debate, science, art, music, drama), and community service opportunities. These activities are designed to help students develop their talents and interests outside the classroom.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Do you offer boarding facilities?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Yes, we offer boarding facilities for both boys and girls. Our boarding houses are supervised by experienced house parents who ensure the safety and well-being of our students. Boarding students have access to study facilities, recreational areas, and dining services.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What is your school's academic performance?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Embeko Secondary School has consistently achieved excellent results in national examinations. In the past five years, our students have maintained a pass rate of over 90% in CSEE and FTNA examinations. Many of our students have gone on to pursue higher education at prestigious universities both locally and internationally.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .contact-info-card {
        border-left: 5px solid #0d6efd !important;
    }
    .map-container {
        border-radius: 5px;
        overflow: hidden;
    }
    .social-icons .btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .social-icons .btn:hover {
        transform: translateY(-3px);
    }
    .contact-form .form-control {
        padding: 0.8rem;
        border-radius: 0;
    }
    .accordion-button:not(.collapsed) {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }
</style>
@endpush
