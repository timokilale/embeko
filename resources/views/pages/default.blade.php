@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? $page->description)

@section('meta_keywords', $page->meta_keywords)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">{{ $page->title }}</h1>
            
            @if($page->description)
                <div class="lead mb-5">{{ $page->description }}</div>
            @endif
            
            @foreach($page->sections as $section)
                <div class="mb-5" id="{{ $section->identifier }}">
                    @if($section->title)
                        <h2 class="mb-4">{{ $section->title }}</h2>
                    @endif
                    
                    @if($section->type == 'html')
                        {!! $section->content !!}
                    @elseif($section->type == 'text')
                        <div class="content-text">
                            {{ $section->content }}
                        </div>
                    @elseif($section->type == 'table')
                        <div class="table-responsive">
                            {!! $section->content !!}
                        </div>
                    @elseif($section->type == 'accordion')
                        <div class="accordion" id="accordion-{{ $section->id }}">
                            {!! $section->content !!}
                        </div>
                    @elseif($section->type == 'cards')
                        <div class="row">
                            {!! $section->content !!}
                        </div>
                    @else
                        {!! $section->content !!}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
