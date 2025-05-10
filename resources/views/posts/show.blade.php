@extends('layouts.app')

@section('title', $post->title . ' - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Post Header -->
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">News</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
                <h1 class="mb-3">{{ $post->title }}</h1>
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-primary me-2">{{ $post->category->name }}</span>
                    <span class="text-muted">
                        <i class="far fa-calendar-alt me-1"></i> {{ $post->published_at->format('M d, Y') }}
                    </span>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-4">
                @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded" alt="{{ $post->title }}">
                @else
                    <img src="{{ asset('images/news-placeholder.jpg') }}" class="img-fluid rounded" alt="{{ $post->title }}">
                @endif
            </div>

            <!-- Post Content -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Share This Post</h5>
                    <div class="d-flex">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary me-2">
                            <i class="fab fa-facebook-f me-1"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-outline-info me-2">
                            <i class="fab fa-twitter me-1"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-outline-success me-2">
                            <i class="fab fa-whatsapp me-1"></i> WhatsApp
                        </a>
                        <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode('Check out this post: ' . request()->url()) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-envelope me-1"></i> Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Posts -->
            @if($relatedPosts->count() > 0)
                <h4 class="mb-3">Related Posts</h4>
                <div class="row">
                    @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                @if($relatedPost->featured_image)
                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" class="card-img-top" alt="{{ $relatedPost->title }}">
                                @else
                                    <img src="{{ asset('images/news-placeholder.jpg') }}" class="card-img-top" alt="{{ $relatedPost->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($relatedPost->title, 40) }}</h5>
                                    <p class="card-text">{{ Str::limit($relatedPost->excerpt, 80) }}</p>
                                    <a href="{{ route('posts.show', $relatedPost->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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

@push('styles')
<style>
    .post-content {
        line-height: 1.8;
    }
    .post-content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
    }
    .post-content h2, .post-content h3, .post-content h4 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    .post-content p {
        margin-bottom: 1rem;
    }
    .post-content ul, .post-content ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
</style>
@endpush
