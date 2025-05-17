<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach($announcements as $announcement)
                <div class="alert alert-light" role="alert">
                    <span class="fw-bold text-danger">{{$announcement->title}}</span>
                    <div class="pre-form-one">
                        <p class="text-secondary-emphasis">{!! \Illuminate\Support\Str::limit($announcement->content,100) !!}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-4">
                            <img src="{{ $announcement->featured_image }}" alt="" class="img-fluid" />
                            <div class="col-12 px-4">
                                <a class="link-info link-underline-opacity-100" href="{{ route('posts.show', $announcement->slug) }}">Read more..</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
