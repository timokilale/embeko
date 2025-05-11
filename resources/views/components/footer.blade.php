<footer class="footer mt-5 border-top">
    <div class="container py-4">
        <div class="row g-4">
            <!-- Map Section -->
            <div class="col-lg-3 col-md-6">
                @include('components.maps')
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-heading">Contact Us</h5>
                    <address class="mb-0">
                        <p><i class="fas fa-map-marker-alt me-2"></i> {{ $schoolInfo->address ?? 'Kondoa Mjini, Karibu na Benki ya CRDB Kondoa' }}</p>
                        <p><i class="fas fa-phone me-2"></i> {{ $schoolInfo->phone ?? '+255 764 581 739 / +255 786 853 890' }}</p>
                        <p><i class="fas fa-envelope me-2"></i> {{ $schoolInfo->email ?? 'support@embeko.ac.tz' }}</p>
                    </address>

                    <h5 class="footer-heading mt-4">Connect With Us</h5>
                    <div class="social-icons">
                        @if(isset($schoolInfo->facebook))
                            <a href="{{ $schoolInfo->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @else
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif

                        @if(isset($schoolInfo->twitter))
                            <a href="{{ $schoolInfo->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @else
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif

                        @if(isset($schoolInfo->instagram))
                            <a href="{{ $schoolInfo->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @else
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif

                        @if(isset($schoolInfo->youtube))
                            <a href="{{ $schoolInfo->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @else
                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-heading">Quick Links</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-links">
                                <li><a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i>Home</a></li>
                                <li><a href="{{ route('page.show', 'about-us') }}"><i class="fas fa-angle-right me-2"></i>About Us</a></li>
                                <li><a href="{{ route('page.show', 'admissions') }}"><i class="fas fa-angle-right me-2"></i>How to Apply</a></li>
                                <li><a href="{{ route('page.show', 'fees') }}"><i class="fas fa-angle-right me-2"></i>Fees Structure</a></li>
                                <li><a href="{{ route('results.index') }}"><i class="fas fa-angle-right me-2"></i>Results</a></li>
                                <li><a href="{{ route('posts.index') }}"><i class="fas fa-angle-right me-2"></i>News</a></li>
                                <li><a href="{{ route('events.index') }}"><i class="fas fa-angle-right me-2"></i>Events</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-links">
                                <li><a href="{{ route('downloads.index') }}"><i class="fas fa-angle-right me-2"></i>Downloads</a></li>
                                <li><a href="{{ route('page.show', 'contact-us') }}"><i class="fas fa-angle-right me-2"></i>Contact Us</a></li>
                                <li><a href="{{ route('results.overall') }}"><i class="fas fa-angle-right me-2"></i>School Performance</a></li>
                                <li><a href="{{ route('login') }}"><i class="fas fa-lock me-2"></i>Admin Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- External Links & Newsletter -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-heading">External Links</h5>
                    <ul class="footer-links">
                        <li><a href="https://www.moe.go.tz/" target="_blank"><i class="fas fa-external-link-alt me-2"></i>Ministry of Education</a></li>
                        <li><a href="https://www.necta.go.tz/" target="_blank"><i class="fas fa-external-link-alt me-2"></i>NECTA</a></li>
                        <li><a href="https://www.dodoma.go.tz/" target="_blank"><i class="fas fa-external-link-alt me-2"></i>Dodoma City Council</a></li>
                        <li><a href="https://elct.or.tz/dioceses/dodoma/" target="_blank"><i class="fas fa-external-link-alt me-2"></i>ELCT DODOMA DIOCESE</a></li>
                    </ul>

                    <h5 class="footer-heading mt-4">Newsletter</h5>
                    <p>Subscribe to our newsletter to receive updates and news.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom border-top">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} Embeko Secondary School. All Rights Reserved.</p>
                    <div class="mt-2">
                        <a href="{{ route('page.show', 'privacy-policy') }}" class="me-3 text-decoration-none">Privacy Policy</a>
                        <a href="{{ route('page.show', 'terms-of-service') }}" class="text-decoration-none">Terms of Service</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Developed & Maintained by <a href="https://github.com/timokilale" target="_blank" class="developer-link">Royal Tech Services</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
