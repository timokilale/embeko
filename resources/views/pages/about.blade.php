@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? $page->description)

@section('meta_keywords', $page->meta_keywords)

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12">
            <h1 class="mb-3">{{ $page->title }}</h1>
            @if($page->description)
                <p class="lead">{{ $page->description }}</p>
            @endif
        </div>
    </div>
    
    <!-- Introduction Section -->
    @php
        $introSection = $page->sections->where('identifier', 'introduction')->first();
    @endphp
    
    @if($introSection)
        <div class="row mb-5">
            <div class="col-12">
                @if($introSection->title && $introSection->title != 'Introduction')
                    <h2 class="mb-4">{{ $introSection->title }}</h2>
                @endif
                
                @if($introSection->type == 'html')
                    {!! $introSection->content !!}
                @else
                    {{ $introSection->content }}
                @endif
            </div>
        </div>
    @endif
    
    <!-- Mission and Vision -->
    <div class="row mb-5">
        @php
            $missionSection = $page->sections->where('identifier', 'mission')->first();
            $visionSection = $page->sections->where('identifier', 'vision')->first();
        @endphp
        
        @if($missionSection)
            <div class="col-md-6 mb-4 mb-md-0">
                @if($missionSection->title)
                    <h2 class="mb-4">{{ $missionSection->title }}</h2>
                @endif
                
                @if($missionSection->type == 'html')
                    {!! $missionSection->content !!}
                @else
                    {{ $missionSection->content }}
                @endif
            </div>
        @endif
        
        @if($visionSection)
            <div class="col-md-6">
                @if($visionSection->title)
                    <h2 class="mb-4">{{ $visionSection->title }}</h2>
                @endif
                
                @if($visionSection->type == 'html')
                    {!! $visionSection->content !!}
                @else
                    {{ $visionSection->content }}
                @endif
            </div>
        @endif
    </div>
    
    <!-- Core Values Section -->
    @php
        $valuesSection = $page->sections->where('identifier', 'values')->first();
    @endphp
    
    @if($valuesSection)
        <div class="mb-5">
            @if($valuesSection->title)
                <h2 class="mb-4">{{ $valuesSection->title }}</h2>
            @endif
            
            @if($valuesSection->type == 'html')
                {!! $valuesSection->content !!}
            @else
                {{ $valuesSection->content }}
            @endif
        </div>
    @endif
    
    <!-- History Section -->
    @php
        $historySection = $page->sections->where('identifier', 'history')->first();
    @endphp
    
    @if($historySection)
        <div class="mb-5">
            @if($historySection->title)
                <h2 class="mb-4">{{ $historySection->title }}</h2>
            @endif
            
            @if($historySection->type == 'html')
                {!! $historySection->content !!}
            @else
                {{ $historySection->content }}
            @endif
        </div>
    @endif
    
    <!-- Leadership Section -->
    @php
        $leadershipSection = $page->sections->where('identifier', 'leadership')->first();
    @endphp
    
    @if($leadershipSection)
        <div class="mb-5">
            @if($leadershipSection->title)
                <h2 class="mb-4">{{ $leadershipSection->title }}</h2>
            @endif
            
            @if($leadershipSection->type == 'html')
                {!! $leadershipSection->content !!}
            @else
                {{ $leadershipSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Achievements Section -->
    @php
        $achievementsSection = $page->sections->where('identifier', 'achievements')->first();
    @endphp
    
    @if($achievementsSection)
        <div class="mb-5">
            @if($achievementsSection->title)
                <h2 class="mb-4">{{ $achievementsSection->title }}</h2>
            @endif
            
            @if($achievementsSection->type == 'html')
                {!! $achievementsSection->content !!}
            @else
                {{ $achievementsSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Other Sections -->
    @foreach($page->sections as $section)
        @if(!in_array($section->identifier, ['introduction', 'mission', 'vision', 'values', 'history', 'leadership', 'achievements']))
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
        @endif
    @endforeach
</div>

<style>
/* Timeline styling */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 2px;
    background-color: #dee2e6;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-year {
    position: absolute;
    left: -50px;
    top: 0;
    font-weight: bold;
    color: #007bff;
}

.timeline-content {
    padding-left: 20px;
}

.timeline-content h5 {
    margin-bottom: 5px;
}

.timeline-item:before {
    content: '';
    position: absolute;
    left: -38px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #007bff;
}
</style>
@endsection
