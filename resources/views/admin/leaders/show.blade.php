@extends('layouts.admin')

@section('title', 'Leader Profile - ' . $leader->name)

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Leader Profile</h1>
        <div>
            <a href="{{ route('admin.leaders.edit', $leader->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.leaders.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Leaders
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($leader->image)
                            <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center mx-auto rounded-circle" style="width: 200px; height: 200px;">
                                <i class="fas fa-user fa-4x text-secondary"></i>
                            </div>
                        @endif
                    </div>
                    <h4 class="card-title">{{ $leader->name }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $leader->position }}</h6>
                    <div class="mt-3">
                        <span class="badge {{ $leader->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $leader->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Profile Details</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">Description</h6>
                    <p class="card-text">{{ $leader->description ?: 'No description provided.' }}</p>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Created:</strong> {{ $leader->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $leader->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
