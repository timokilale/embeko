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
    
    <!-- Curriculum Overview Section -->
    @php
        $curriculumSection = $page->sections->where('identifier', 'curriculum_overview')->first();
    @endphp
    
    @if($curriculumSection)
        <div class="mb-5">
            @if($curriculumSection->title)
                <h2 class="mb-4">{{ $curriculumSection->title }}</h2>
            @endif
            
            @if($curriculumSection->type == 'html')
                {!! $curriculumSection->content !!}
            @else
                {{ $curriculumSection->content }}
            @endif
        </div>
    @endif
    
    <!-- O-Level and A-Level Programs -->
    <div class="row mb-5">
        @php
            $oLevelSection = $page->sections->where('identifier', 'o_level')->first();
            $aLevelSection = $page->sections->where('identifier', 'a_level')->first();
        @endphp
        
        @if($oLevelSection)
            <div class="col-lg-6 mb-4 mb-lg-0">
                @if($oLevelSection->title)
                    <h2 class="mb-4">{{ $oLevelSection->title }}</h2>
                @endif
                
                @if($oLevelSection->type == 'html')
                    {!! $oLevelSection->content !!}
                @else
                    {{ $oLevelSection->content }}
                @endif
            </div>
        @endif
        
        @if($aLevelSection)
            <div class="col-lg-6">
                @if($aLevelSection->title)
                    <h2 class="mb-4">{{ $aLevelSection->title }}</h2>
                @endif
                
                @if($aLevelSection->type == 'html')
                    {!! $aLevelSection->content !!}
                @else
                    {{ $aLevelSection->content }}
                @endif
            </div>
        @endif
    </div>
    
    <!-- Teaching Approach Section -->
    @php
        $teachingSection = $page->sections->where('identifier', 'teaching_approach')->first();
    @endphp
    
    @if($teachingSection)
        <div class="mb-5">
            @if($teachingSection->title)
                <h2 class="mb-4">{{ $teachingSection->title }}</h2>
            @endif
            
            @if($teachingSection->type == 'html')
                {!! $teachingSection->content !!}
            @else
                {{ $teachingSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Academic Support Section -->
    @php
        $supportSection = $page->sections->where('identifier', 'academic_support')->first();
    @endphp
    
    @if($supportSection)
        <div class="mb-5">
            @if($supportSection->title)
                <h2 class="mb-4">{{ $supportSection->title }}</h2>
            @endif
            
            @if($supportSection->type == 'html')
                {!! $supportSection->content !!}
            @else
                {{ $supportSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Assessment and Evaluation Section -->
    @php
        $assessmentSection = $page->sections->where('identifier', 'assessment')->first();
    @endphp
    
    @if($assessmentSection)
        <div class="mb-5">
            @if($assessmentSection->title)
                <h2 class="mb-4">{{ $assessmentSection->title }}</h2>
            @endif
            
            @if($assessmentSection->type == 'html')
                {!! $assessmentSection->content !!}
            @else
                {{ $assessmentSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Academic Facilities Section -->
    @php
        $facilitiesSection = $page->sections->where('identifier', 'facilities')->first();
    @endphp
    
    @if($facilitiesSection)
        <div class="mb-5">
            @if($facilitiesSection->title)
                <h2 class="mb-4">{{ $facilitiesSection->title }}</h2>
            @endif
            
            @if($facilitiesSection->type == 'html')
                {!! $facilitiesSection->content !!}
            @else
                {{ $facilitiesSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Academic Calendar Section -->
    @php
        $calendarSection = $page->sections->where('identifier', 'calendar')->first();
    @endphp
    
    @if($calendarSection)
        <div class="mb-5">
            @if($calendarSection->title)
                <h2 class="mb-4">{{ $calendarSection->title }}</h2>
            @endif
            
            @if($calendarSection->type == 'html')
                {!! $calendarSection->content !!}
            @else
                {{ $calendarSection->content }}
            @endif
        </div>
    @endif
    
    <!-- FAQ Section -->
    @php
        $faqSection = $page->sections->where('identifier', 'faq')->first();
    @endphp
    
    @if($faqSection)
        <div class="mb-5">
            @if($faqSection->title)
                <h2 class="mb-4">{{ $faqSection->title }}</h2>
            @endif
            
            @if($faqSection->type == 'html')
                {!! $faqSection->content !!}
            @elseif($faqSection->type == 'accordion')
                <div class="accordion" id="academicsFAQ">
                    {!! $faqSection->content !!}
                </div>
            @else
                {{ $faqSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Other Sections -->
    @foreach($page->sections as $section)
        @if(!in_array($section->identifier, ['introduction', 'curriculum_overview', 'o_level', 'a_level', 'teaching_approach', 'academic_support', 'assessment', 'facilities', 'calendar', 'faq']))
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
@endsection
