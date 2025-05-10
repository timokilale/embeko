<div class="container">
    <div class="row flex-column">
        @forelse($latestPosts as $post)
            <div class="col mb-4">
                <div class="card h-100">
                    <i class="fa fa-newspaper"></i>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                        <a href="{{ route('posts.show', $post->slug) }}" target="_blank">
                            Read More
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">No News Available</h5>
                        <p class="card-text">Check back later for the latest news and updates.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
