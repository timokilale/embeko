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

    <div class="mb-5">
        <h2 class="mb-4">{{ $leadershipSection->title ?? 'School Leadership' }}</h2>

        @if($leadershipSection && ($leadershipSection->type == 'html' || $leadershipSection->type == 'text'))
            <div class="mb-4">
                @if($leadershipSection->type == 'html')
                    {!! $leadershipSection->content !!}
                @else
                    {{ $leadershipSection->content }}
                @endif
            </div>
        @endif

        @if(isset($leaders) && $leaders->count() > 0)
            <div class="row">
                @foreach($leaders as $leader)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="text-center pt-3">
                                @if($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center mx-auto rounded-circle" style="width: 150px; height: 150px;">
                                        <i class="fas fa-user fa-4x text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $leader->name }}</h5>
                                <p class="card-subtitle mb-2 text-muted">{{ $leader->position }}</p>
                                <p class="card-text">{{ $leader->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>No leadership profiles have been added yet.
            </div>
        @endif
    </div>

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
        @if(!in_array($section->identifier, ['introduction', 'mission', 'vision', 'values', 'history', 'achievements']))
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
    padding-left: 70px; /* Increased padding to make room for years */
    margin-top: 30px;
}

.timeline:before {
    content: '';
    position: absolute;
    left: 40px; /* Moved line to the right */
    top: 0;
    height: 100%;
    width: 2px;
    background-color: #FFD700; /* Gold color to match navbar */
}

.timeline-item {
    position: relative;
    margin-bottom: 40px; /* Increased spacing between items */
    clear: both; /* Prevent overlapping */
}

.timeline-year {
    position: absolute;
    left: -60px; /* Positioned further left */
    top: 0;
    width: 50px; /* Wider to fit years */
    text-align: right;
    font-weight: bold;
    color: #333;
    font-size: 1rem;
}

.timeline-content {
    padding-left: 20px;
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-left: 10px;
}

.timeline-content h5 {
    margin-bottom: 10px;
    color: #333;
}

.timeline-item:before {
    content: '';
    position: absolute;
    left: -30px; /* Adjusted position */
    top: 10px;
    width: 16px; /* Larger dot */
    height: 16px;
    border-radius: 50%;
    background-color: #FFD700; /* Gold color to match navbar */
    border: 2px solid white;
    box-shadow: 0 0 0 2px #FFD700;
    z-index: 1;
}
</style>
@endsection
