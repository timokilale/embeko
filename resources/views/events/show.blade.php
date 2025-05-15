@extends('layouts.app')

@section('title', $event->title . ' - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Event Header -->
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
                    </ol>
                </nav>
                <h1 class="mb-3">{{ $event->title }}</h1>
                <div class="d-flex flex-wrap align-items-center mb-3">
                    @if($event->start_date >= now())
                        <span class="badge bg-success me-2">Upcoming</span>
                    @else
                        <span class="badge bg-secondary me-2">Past</span>
                    @endif

                    @if($event->is_featured)
                        <span class="badge bg-warning me-2">Featured</span>
                    @endif
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-4">
                @if($event->featured_image)
                    <img src="{{ asset('storage/' . $event->featured_image) }}" class="img-fluid rounded" alt="{{ $event->title }}">
                @else
                    <img src="{{ asset('images/event-placeholder.jpg') }}" class="img-fluid rounded" alt="{{ $event->title }}">
                @endif
            </div>

            <!-- Event Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h5><i class="far fa-calendar-alt text-primary me-2"></i> Date & Time</h5>
                            <p class="mb-0">
                                {{ $event->start_date->format('F d, Y') }}<br>
                                {{ $event->start_date->format('g:i A') }}
                                @if($event->end_date)
                                    - {{ $event->end_date->format('g:i A') }}
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-map-marker-alt text-primary me-2"></i> Location</h5>
                            <p class="mb-0">{{ $event->location ?: 'Location TBA' }}</p>
                        </div>
                    </div>

                    <h5 class="mb-3">Event Description</h5>
                    <div class="event-description">
                        {!!$event->description!!}
                    </div>

                    @if($event->start_date >= now())
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary">
                                <i class="far fa-calendar-plus me-2"></i> Add to Calendar
                            </a>
                            <a href="#" class="btn btn-outline-primary ms-2">
                                <i class="fas fa-share-alt me-2"></i> Share Event
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Countdown Timer (for upcoming events) -->
            @if($event->start_date >= now())
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h5 class="mb-3">Event Starts In</h5>
                        <div class="row countdown" data-date="{{ $event->start_date->format('Y/m/d H:i:s') }}">
                            <div class="col-3">
                                <div class="countdown-item">
                                    <span class="countdown-number days">00</span>
                                    <span class="countdown-label">Days</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="countdown-item">
                                    <span class="countdown-number hours">00</span>
                                    <span class="countdown-label">Hours</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="countdown-item">
                                    <span class="countdown-number minutes">00</span>
                                    <span class="countdown-label">Minutes</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="countdown-item">
                                    <span class="countdown-number seconds">00</span>
                                    <span class="countdown-label">Seconds</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Share Buttons -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Share This Event</h5>
                    <div class="d-flex">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary me-2">
                            <i class="fab fa-facebook-f me-1"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($event->title) }}" target="_blank" class="btn btn-outline-info me-2">
                            <i class="fab fa-twitter me-1"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($event->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-outline-success me-2">
                            <i class="fab fa-whatsapp me-1"></i> WhatsApp
                        </a>
                        <a href="mailto:?subject={{ urlencode($event->title) }}&body={{ urlencode('Check out this event: ' . request()->url()) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-envelope me-1"></i> Email
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Other Events -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Other Upcoming Events</h5>
                </div>
                <div class="card-body">
                    @if($otherEvents->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($otherEvents as $otherEvent)
                                <li class="list-group-item">
                                    <div class="row g-0">
                                        <div class="col-3">
                                            @if($otherEvent->featured_image)
                                                <img src="{{ asset('storage/' . $otherEvent->featured_image) }}" class="img-fluid rounded" alt="{{ $otherEvent->title }}">
                                            @else
                                                <img src="{{ asset('images/event-placeholder.jpg') }}" class="img-fluid rounded" alt="{{ $otherEvent->title }}">
                                            @endif
                                        </div>
                                        <div class="col-9 ps-3">
                                            <a href="{{ route('events.show', $otherEvent->slug) }}" class="text-decoration-none">
                                                <h6 class="mb-1">{{ Str::limit($otherEvent->title, 40) }}</h6>
                                            </a>
                                            <small class="text-muted">{{ $otherEvent->start_date->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            <a href="{{ route('events.index') }}" class="btn btn-outline-primary w-100">View All Events</a>
                        </div>
                    @else
                        <p class="text-center mb-0">No other upcoming events at the moment.</p>
                    @endif
                </div>
            </div>

            <!-- Event Location Map -->
            @if($event->location)
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Event Location</h5>
                    </div>
                    <div class="card-body">
                        <div class="map-container">
                            <iframe
                                class="gmap_iframe"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=embeko secondary school&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                            ></iframe>
                        </div>
                        <p class="mt-2 mb-0">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i> {{ $event->location }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .event-description {
        line-height: 1.8;
    }
    .countdown-item {
        background-color: #f8f9fa;
        border-radius: 5px;
        padding: 10px;
    }
    .countdown-number {
        font-size: 2rem;
        font-weight: 700;
        display: block;
    }
    .countdown-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        color: #6c757d;
    }
</style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdown = document.querySelector('.countdown');
            if (!countdown) return;

            const targetDate = new Date(countdown.dataset.date).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance <= 0) {
                    document.querySelector('.countdown').innerHTML = '<div class="col-12"><p class="text-danger">Event has started!</p></div>';
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdown.querySelector('.days').textContent = String(days).padStart(2, '0');
                countdown.querySelector('.hours').textContent = String(hours).padStart(2, '0');
                countdown.querySelector('.minutes').textContent = String(minutes).padStart(2, '0');
                countdown.querySelector('.seconds').textContent = String(seconds).padStart(2, '0');
            }

            updateCountdown(); // Initial run
            const interval = setInterval(updateCountdown, 1000); // Update every second
        });
    </script>
@endpush
