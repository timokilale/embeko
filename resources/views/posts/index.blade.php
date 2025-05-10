@extends('layouts.app')

@section('title', 'News & Blog - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <h1 class="mb-4">News & Blog</h1>
            
            <!-- Search Form -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('posts.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search news..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Posts List -->
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                            @else
                                <img src="{{ asset('images/news-placeholder.jpg') }}" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge bg-primary">{{ $post->category->name }}</span>
                                    <small class="text-muted">{{ $post->published_at->format('M d, Y') }}</small>
                                </div>
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No posts found. {{ request('search') ? 'Try a different search term.' : '' }}
                            {{ request('category') ? 'Try a different category.' : '' }}
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Categories -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Categories</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none">
                                    {{ $category->name }}
                                </a>
                                <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <!-- Recent Posts -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Recent Posts</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($recentPosts as $recentPost)
                            <li class="list-group-item">
                                <div class="row g-0">
                                    <div class="col-3">
                                        @if($recentPost->featured_image)
                                            <img src="{{ asset('storage/' . $recentPost->featured_image) }}" class="img-fluid rounded" alt="{{ $recentPost->title }}">
                                        @else
                                            <img src="{{ asset('images/news-placeholder.jpg') }}" class="img-fluid rounded" alt="{{ $recentPost->title }}">
                                        @endif
                                    </div>
                                    <div class="col-9 ps-3">
                                        <a href="{{ route('posts.show', $recentPost->slug) }}" class="text-decoration-none">
                                            <h6 class="mb-1">{{ Str::limit($recentPost->title, 40) }}</h6>
                                        </a>
                                        <small class="text-muted">{{ $recentPost->published_at->format('M d, Y') }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <!-- Subscribe -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Subscribe to Newsletter</h5>
                </div>
                <div class="card-body">
                    <p>Stay updated with our latest news and events.</p>
                    <form action="#" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your email address" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
