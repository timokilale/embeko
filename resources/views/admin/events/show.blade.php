@extends('layouts.admin')

@section('title', 'View Event')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Event</h1>
        <div>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Events
            </a>
            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i> Edit Event
            </a>
            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-info" target="_blank">
                <i class="fas fa-eye me-2"></i> View on Site
            </a>
        </div>
    </div>

    <!-- Event Details -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Event Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
                </div>
                <div class="card-body">
                    @if($event->image)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded" style="max-height: 400px;">
                        </div>
                    @endif
                    
                    <h1 class="h2 mb-3">{{ $event->title }}</h1>
                    
                    <div class="mb-4">
                        <strong><i class="fas fa-map-marker-alt text-primary me-2"></i> Location:</strong> {{ $event->location }}
                    </div>
                    
                    <div class="mb-4">
                        <strong><i class="fas fa-calendar-alt text-primary me-2"></i> Date:</strong>
                        {{ $event->start_date->format('F d, Y - h:i A') }}
                        @if($event->end_date)
                            <br>
                            <strong><i class="fas fa-calendar-check text-primary me-2"></i> End Date:</strong>
                            {{ $event->end_date->format('F d, Y - h:i A') }}
                        @endif
                    </div>
                    
                    <div class="mb-4">
                        <strong><i class="fas fa-align-left text-primary me-2"></i> Description:</strong>
                        <div class="mt-2">
                            {!! $event->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Event Metadata -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Information</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Status:</strong>
                            @if($event->start_date->isFuture())
                                <span class="badge bg-success">Upcoming</span>
                            @else
                                <span class="badge bg-secondary">Past</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Featured:</strong>
                            @if($event->is_featured)
                                <span class="badge bg-warning">Yes</span>
                            @else
                                <span class="badge bg-light text-dark">No</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Created:</strong>
                            <span>{{ $event->created_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Last Updated:</strong>
                            <span>{{ $event->updated_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Slug:</strong>
                            <span class="text-truncate" style="max-width: 200px;">{{ $event->slug }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit Event
                        </a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this event?')">
                                <i class="fas fa-trash me-2"></i> Delete Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
