@extends('layouts.admin')

@section('title', 'View Category')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Category</h1>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Categories
            </a>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i> Edit Category
            </a>
            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-info" target="_blank">
                <i class="fas fa-eye me-2"></i> View on Site
            </a>
        </div>
    </div>

    <!-- Category Details -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Category Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                </div>
                <div class="card-body">
                    <h2 class="h4 mb-3">{{ $category->name }}</h2>
                    
                    <div class="mb-4">
                        <strong>Slug:</strong> {{ $category->slug }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Description:</strong>
                        <p class="mt-2">{{ $category->description ?: 'No description available.' }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <strong>Created:</strong> {{ $category->created_at->format('M d, Y H:i') }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Last Updated:</strong> {{ $category->updated_at->format('M d, Y H:i') }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Posts Count:</strong> {{ $category->posts_count }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <!-- Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit Category
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fas fa-trash me-2"></i> Delete Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Related Posts -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Related Posts</h6>
                </div>
                <div class="card-body">
                    @if($category->posts_count > 0)
                        <div class="list-group">
                            @foreach($category->posts()->latest()->take(5)->get() as $post)
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <p class="mb-1">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                    <small>
                                        @if($post->status == 'published')
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </small>
                                </a>
                            @endforeach
                        </div>
                        
                        @if($category->posts_count > 5)
                            <div class="mt-3 text-center">
                                <a href="{{ route('admin.posts.index', ['category' => $category->id]) }}" class="btn btn-sm btn-primary">
                                    View All {{ $category->posts_count }} Posts
                                </a>
                            </div>
                        @endif
                    @else
                        <p class="text-center">No posts in this category yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
