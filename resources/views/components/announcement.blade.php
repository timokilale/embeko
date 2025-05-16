<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach($announcements as $announcement)
                <div class="alert alert-primary text-primary" role="alert">
                    {{$announcement->title}}
                    <div class="pre-form-one">
                        <p>{!! \Illuminate\Support\Str::limit($announcement->content,100) !!}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-4">
                            <img src="{{ $announcement->featured_image }}" alt="" class="img-fluid" />
                            <div class="col-12 px-4">
                                <a href="{{ route('posts.show', $announcement->slug) }}">Read more..</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
