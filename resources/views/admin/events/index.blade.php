@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Events</h1>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Add New Event
        </a>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.events.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Search by title, description, or location">
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">All Events</option>
                        <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="past" {{ request('status') == 'past' ? 'selected' : '' }}>Past</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="featured" class="form-label">Featured</label>
                    <select class="form-select" id="featured" name="featured">
                        <option value="">All</option>
                        <option value="yes" {{ request('featured') == 'yes' ? 'selected' : '' }}>Featured Only</option>
                        <option value="no" {{ request('featured') == 'no' ? 'selected' : '' }}>Non-Featured Only</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Events Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Events</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="eventsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-thumbnail me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                    {{ $event->title }}
                                </td>
                                <td>{{ $event->location }}</td>
                                <td>
                                    {{ $event->start_date->format('M d, Y') }}
                                    @if($event->end_date)
                                        <br>to {{ $event->end_date->format('M d, Y') }}
                                    @endif
                                </td>
                                <td>
                                    @if($event->start_date->isFuture())
                                        <span class="badge bg-success">Upcoming</span>
                                    @else
                                        <span class="badge bg-secondary">Past</span>
                                    @endif
                                </td>
                                <td>
                                    @if($event->is_featured)
                                        <span class="badge bg-warning">Featured</span>
                                    @else
                                        <span class="badge bg-light text-dark">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-info" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-confirm="Are you sure you want to delete this event? This action cannot be undone.">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No events found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $events->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
