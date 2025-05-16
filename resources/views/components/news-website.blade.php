<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach($news as $new)
                <div class="alert alert-primary text-primary" role="alert">
                    {{$new->title}}
                    <div class="pre-form-one">
                        <p>{!! \Illuminate\Support\Str::limit($new->content,100) !!}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-4">
                            <img src="{{ $new->featured_image }}" alt="" class="img-fluid" />
                            <div class="col-12 px-4">
                                <a href="{{ route('posts.show', $new->slug) }}">Read more..</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

