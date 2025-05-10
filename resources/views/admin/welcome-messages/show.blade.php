@extends('layouts.admin')

@section('title', 'View Welcome Message')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Welcome Message Details</h1>
        <div>
            <a href="{{ route('admin.welcome-messages.edit', $welcomeMessage->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.welcome-messages.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Welcome Messages
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($welcomeMessage->image)
                            <img src="{{ asset('storage/' . $welcomeMessage->image) }}" alt="{{ $welcomeMessage->title }}" class="img-fluid" style="max-height: 300px;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center mx-auto" style="width: 200px; height: 200px;">
                                <i class="fas fa-image fa-4x text-secondary"></i>
                            </div>
                        @endif
                    </div>
                    <h4 class="card-title">{{ $welcomeMessage->title }}</h4>
                    @if($welcomeMessage->author_name)
                        <p class="card-subtitle mb-2 text-muted">
                            {{ $welcomeMessage->author_name }}<br>
                            {{ $welcomeMessage->author_title }}
                        </p>
                    @endif
                    <div class="mt-3">
                        <span class="badge {{ $welcomeMessage->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $welcomeMessage->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Content</h5>
                </div>
                <div class="card-body">
                    <div class="welcome-content">
                        {!! $welcomeMessage->content !!}
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Created:</strong> {{ $welcomeMessage->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $welcomeMessage->updated_at->format('M d, Y') }}</p>
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
    .welcome-content {
        line-height: 1.6;
    }
    
    .welcome-content p {
        margin-bottom: 1rem;
    }
</style>
@endpush
