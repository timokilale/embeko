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
    
    <!-- Contact Information Section -->
    @php
        $contactInfoSection = $page->sections->where('identifier', 'contact_info')->first();
    @endphp
    
    @if($contactInfoSection)
        <div class="mb-5">
            @if($contactInfoSection->title)
                <h2 class="mb-4">{{ $contactInfoSection->title }}</h2>
            @endif
            
            @if($contactInfoSection->type == 'html')
                {!! $contactInfoSection->content !!}
            @else
                {{ $contactInfoSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Office Hours Section -->
    @php
        $officeHoursSection = $page->sections->where('identifier', 'office_hours')->first();
    @endphp
    
    @if($officeHoursSection)
        <div class="mb-5">
            @if($officeHoursSection->title)
                <h2 class="mb-4">{{ $officeHoursSection->title }}</h2>
            @endif
            
            @if($officeHoursSection->type == 'html')
                {!! $officeHoursSection->content !!}
            @else
                {{ $officeHoursSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Contact Form and Map Sections -->
    <div class="row mb-5">
        @php
            $contactFormSection = $page->sections->where('identifier', 'contact_form')->first();
            $mapSection = $page->sections->where('identifier', 'map')->first();
        @endphp
        
        @if($contactFormSection)
            <div class="col-lg-6 mb-4 mb-lg-0">
                @if($contactFormSection->title)
                    <h2 class="mb-4">{{ $contactFormSection->title }}</h2>
                @endif
                
                @if($contactFormSection->type == 'html')
                    {!! $contactFormSection->content !!}
                @else
                    {{ $contactFormSection->content }}
                @endif
            </div>
        @endif
        
        @if($mapSection)
            <div class="col-lg-6">
                @if($mapSection->title)
                    <h2 class="mb-4">{{ $mapSection->title }}</h2>
                @endif
                
                @if($mapSection->type == 'html')
                    {!! $mapSection->content !!}
                @else
                    {{ $mapSection->content }}
                @endif
            </div>
        @endif
    </div>
    
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
                <div class="accordion" id="contactFAQ">
                    {!! $faqSection->content !!}
                </div>
            @else
                {{ $faqSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Other Sections -->
    @foreach($page->sections as $section)
        @if(!in_array($section->identifier, ['introduction', 'contact_info', 'office_hours', 'contact_form', 'map', 'faq']))
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
