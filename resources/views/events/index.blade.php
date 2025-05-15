@extends('layouts.app')

@section('title', 'Events - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">School Events</h1>

    <!-- Upcoming Events -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Upcoming Events</h2>
        </div>

        <div class="row">
            @forelse($upcomingEvents as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}">
                        @else
                            <img src="{{ asset('images/event-placeholder.jpg') }}" class="card-img-top" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge bg-success">{{ $event->start_date->format('M d, Y') }}</span>
                                @if($event->is_featured)
                                    <span class="badge bg-warning">Featured</span>
                                @endif
                            </div>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{!! Str::limit($event->description, 100)!!}</p>
                            <div class="mb-3">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <span>{{ $event->location ?: 'Location TBA' }}</span>
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-clock text-muted me-2"></i>
                                <span>{{ $event->start_date->format('g:i A') }}</span>
                                @if($event->end_date)
                                    <span> - {{ $event->end_date->format('g:i A') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No upcoming events at the moment. Check back soon!
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $upcomingEvents->appends(['past' => request()->past])->links() }}
        </div>
    </section>

    <!-- Past Events -->
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Past Events</h2>
        </div>

        <div class="row">
            @forelse($pastEvents as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}">
                        @else
                            <img src="{{ asset('images/event-placeholder.jpg') }}" class="card-img-top" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge bg-secondary">{{ $event->start_date->format('M d, Y') }}</span>
                                @if($event->is_featured)
                                    <span class="badge bg-warning">Featured</span>
                                @endif
                            </div>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <div class="mb-3">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <span>{{ $event->location ?: 'Location TBA' }}</span>
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-clock text-muted me-2"></i>
                                <span>{{ $event->start_date->format('g:i A') }}</span>
                                @if($event->end_date)
                                    <span> - {{ $event->end_date->format('g:i A') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-outline-secondary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No past events found.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pastEvents->appends(['upcoming' => request()->upcoming])->links() }}
        </div>
    </section>
</div>
@endsection
