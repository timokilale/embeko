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
    
    <!-- Admission Cycles Section -->
    @php
        $cyclesSection = $page->sections->where('identifier', 'admission_cycles')->first();
    @endphp
    
    @if($cyclesSection)
        <div class="mb-5">
            @if($cyclesSection->title)
                <h2 class="mb-4">{{ $cyclesSection->title }}</h2>
            @endif
            
            @if($cyclesSection->type == 'html')
                {!! $cyclesSection->content !!}
            @else
                {{ $cyclesSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Entry Requirements Section -->
    @php
        $requirementsSection = $page->sections->where('identifier', 'entry_requirements')->first();
    @endphp
    
    @if($requirementsSection)
        <div class="mb-5">
            @if($requirementsSection->title)
                <h2 class="mb-4">{{ $requirementsSection->title }}</h2>
            @endif
            
            @if($requirementsSection->type == 'html')
                {!! $requirementsSection->content !!}
            @else
                {{ $requirementsSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Application Process Section -->
    @php
        $processSection = $page->sections->where('identifier', 'application_process')->first();
    @endphp
    
    @if($processSection)
        <div class="mb-5">
            @if($processSection->title)
                <h2 class="mb-4">{{ $processSection->title }}</h2>
            @endif
            
            @if($processSection->type == 'html')
                {!! $processSection->content !!}
            @else
                {{ $processSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Fees and Financial Aid Section -->
    @php
        $feesSection = $page->sections->where('identifier', 'fees_financial_aid')->first();
    @endphp
    
    @if($feesSection)
        <div class="mb-5">
            @if($feesSection->title)
                <h2 class="mb-4">{{ $feesSection->title }}</h2>
            @endif
            
            @if($feesSection->type == 'html')
                {!! $feesSection->content !!}
            @else
                {{ $feesSection->content }}
            @endif
        </div>
    @endif
    
    <!-- International Students Section -->
    @php
        $internationalSection = $page->sections->where('identifier', 'international_students')->first();
    @endphp
    
    @if($internationalSection)
        <div class="mb-5">
            @if($internationalSection->title)
                <h2 class="mb-4">{{ $internationalSection->title }}</h2>
            @endif
            
            @if($internationalSection->type == 'html')
                {!! $internationalSection->content !!}
            @else
                {{ $internationalSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Campus Visit Section -->
    @php
        $visitSection = $page->sections->where('identifier', 'campus_visit')->first();
    @endphp
    
    @if($visitSection)
        <div class="mb-5">
            @if($visitSection->title)
                <h2 class="mb-4">{{ $visitSection->title }}</h2>
            @endif
            
            @if($visitSection->type == 'html')
                {!! $visitSection->content !!}
            @else
                {{ $visitSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Contact Admissions Section -->
    @php
        $contactSection = $page->sections->where('identifier', 'contact_admissions')->first();
    @endphp
    
    @if($contactSection)
        <div class="mb-5">
            @if($contactSection->title)
                <h2 class="mb-4">{{ $contactSection->title }}</h2>
            @endif
            
            @if($contactSection->type == 'html')
                {!! $contactSection->content !!}
            @else
                {{ $contactSection->content }}
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
                <div class="accordion" id="admissionsFAQ">
                    {!! $faqSection->content !!}
                </div>
            @else
                {{ $faqSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Apply Now Section -->
    @php
        $applySection = $page->sections->where('identifier', 'apply_now')->first();
    @endphp
    
    @if($applySection)
        <div class="mb-5">
            @if($applySection->type == 'html')
                {!! $applySection->content !!}
            @else
                {{ $applySection->content }}
            @endif
        </div>
    @endif
    
    <!-- Other Sections -->
    @foreach($page->sections as $section)
        @if(!in_array($section->identifier, ['introduction', 'admission_cycles', 'entry_requirements', 'application_process', 'fees_financial_aid', 'international_students', 'campus_visit', 'contact_admissions', 'faq', 'apply_now']))
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
    max-width: 1200px;
    margin: 0 auto;
}

.timeline-item {
    padding: 10px 40px;
    position: relative;
    margin-bottom: 30px;
    display: flex;
    align-items: flex-start;
}

.timeline-step {
    position: relative;
    min-width: 60px;
    text-align: center;
    margin-right: 20px;
}

.timeline-step-number {
    position: absolute;
    top: 0;
    right: 0;
    width: 24px;
    height: 24px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
}

.timeline-content {
    flex: 1;
}

.timeline-content h5 {
    margin-bottom: 10px;
}
</style>
@endsection
