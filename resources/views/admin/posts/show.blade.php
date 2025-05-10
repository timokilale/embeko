@extends('layouts.admin')

@section('title', 'View Post')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Post</h1>
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Posts
            </a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i> Edit Post
            </a>
            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info" target="_blank">
                <i class="fas fa-eye me-2"></i> View on Site
            </a>
        </div>
    </div>

    <!-- Post Details -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Post Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Post Content</h6>
                </div>
                <div class="card-body">
                    @if($post->featured_image)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid rounded" style="max-height: 400px;">
                        </div>
                    @endif
                    
                    <h1 class="h2 mb-3">{{ $post->title }}</h1>
                    
                    <div class="mb-4">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Post Metadata -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Post Details</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Status:</strong>
                            @if($post->status == 'published')
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Category:</strong>
                            <span>{{ $post->category->name ?? 'Uncategorized' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Created:</strong>
                            <span>{{ $post->created_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Last Updated:</strong>
                            <span>{{ $post->updated_at->format('M d, Y H:i') }}</span>
                        </li>
                        @if($post->published_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Published:</strong>
                                <span>{{ $post->published_at->format('M d, Y H:i') }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Slug:</strong>
                            <span class="text-truncate" style="max-width: 200px;">{{ $post->slug }}</span>
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
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit Post
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash me-2"></i> Delete Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
