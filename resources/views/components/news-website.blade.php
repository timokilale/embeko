<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary text-primary" role="alert">
                {{$news->title}}
                <div class="pre-form-one">
                    <p>{!! \Illuminate\Support\Str::limit($news->content,200) !!}</p>
                </div>
                <div class="row">
                    <div class="col-md-12 px-4">
                        <img src="{{ $news->featured_image }}" alt="" class="img-fluid" />
                        <div class="col-12 px-4">
                            <a href="{{ route('posts.show', $news->slug) }}">Read more..</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

