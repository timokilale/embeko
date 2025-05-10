@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Dashboard</h1>
    <span class="text-muted">Welcome back, {{ Auth::user()->name }}</span>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['posts'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Events</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['events'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Downloads</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['downloads'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-download fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Exam Results</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['examResults'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Posts -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Posts</h6>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body">
                @if($recentPosts->count() > 0)
                    <div class="list-group">
                        @foreach($recentPosts as $post)
                            <a href="{{ route('admin.posts.edit', $post) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $post->title }}</h6>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ Str::limit($post->excerpt, 100) }}</p>
                                <small>
                                    <span class="badge bg-primary">{{ $post->category->name }}</span>
                                    <span class="badge bg-{{ $post->is_published ? 'success' : 'warning' }}">
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-center mb-0">No posts found.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Upcoming Events</h6>
                <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body">
                @if($upcomingEvents->count() > 0)
                    <div class="list-group">
                        @foreach($upcomingEvents as $event)
                            <a href="{{ route('admin.events.edit', $event) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $event->title }}</h6>
                                    <small>{{ $event->start_date->format('M d, Y') }}</small>
                                </div>
                                <p class="mb-1">{{ Str::limit($event->description, 100) }}</p>
                                <small>
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $event->location ?: 'No location specified' }}
                                    @if($event->is_featured)
                                        <span class="badge bg-success ms-2">Featured</span>
                                    @endif
                                </small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-center mb-0">No upcoming events found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-block w-100">
                            <i class="fas fa-plus-circle me-2"></i> Add New Post
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.events.create') }}" class="btn btn-success btn-block w-100">
                            <i class="fas fa-plus-circle me-2"></i> Add New Event
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.downloads.create') }}" class="btn btn-info btn-block w-100 text-white">
                            <i class="fas fa-plus-circle me-2"></i> Add New Download
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.exam-results.create') }}" class="btn btn-warning btn-block w-100">
                            <i class="fas fa-plus-circle me-2"></i> Add Exam Results
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
</style>
@endpush
