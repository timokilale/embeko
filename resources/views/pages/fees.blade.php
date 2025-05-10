@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? $page->description)

@section('meta_keywords', $page->meta_keywords)

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="mb-3">{{ $page->title }}</h1>
            @if($page->description)
                <p class="lead">{{ $page->description }}</p>
            @endif
            
            @php
                $introSection = $page->sections->where('identifier', 'introduction')->first();
            @endphp
            
            @if($introSection)
                @if($introSection->type == 'html')
                    {!! $introSection->content !!}
                @else
                    <p>{{ $introSection->content }}</p>
                @endif
            @endif
        </div>
        <div class="col-lg-6">
            @php
                $infoSection = $page->sections->where('identifier', 'important_info')->first();
            @endphp
            
            @if($infoSection)
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Important Information</h4>
                        @if($infoSection->type == 'html')
                            {!! $infoSection->content !!}
                        @else
                            {{ $infoSection->content }}
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Fee Structure Tabs -->
    @php
        $tabsSection = $page->sections->where('identifier', 'fee_tabs')->first();
    @endphp
    
    @if($tabsSection)
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-white">
                <ul class="nav nav-tabs card-header-tabs" id="feeTabs" role="tablist">
                    @php
                        $ordinarySection = $page->sections->where('identifier', 'ordinary_level')->first();
                        $advancedSection = $page->sections->where('identifier', 'advanced_level')->first();
                        $additionalSection = $page->sections->where('identifier', 'additional_fees')->first();
                    @endphp
                    
                    @if($ordinarySection)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ordinary-tab" data-bs-toggle="tab" data-bs-target="#ordinary" type="button" role="tab" aria-controls="ordinary" aria-selected="true">
                                Ordinary Level (Form 1-4)
                            </button>
                        </li>
                    @endif
                    
                    @if($advancedSection)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced" type="button" role="tab" aria-controls="advanced" aria-selected="false">
                                Advanced Level (Form 5-6)
                            </button>
                        </li>
                    @endif
                    
                    @if($additionalSection)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional" type="button" role="tab" aria-controls="additional" aria-selected="false">
                                Additional Fees
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="feeTabsContent">
                    <!-- Ordinary Level Fees -->
                    @if($ordinarySection)
                        <div class="tab-pane fade show active" id="ordinary" role="tabpanel" aria-labelledby="ordinary-tab">
                            <h4 class="mb-4">Ordinary Level Fees Structure (Form 1-4)</h4>
                            @if($ordinarySection->type == 'html')
                                {!! $ordinarySection->content !!}
                            @else
                                {{ $ordinarySection->content }}
                            @endif
                        </div>
                    @endif
                    
                    <!-- Advanced Level Fees -->
                    @if($advancedSection)
                        <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
                            <h4 class="mb-4">Advanced Level Fees Structure (Form 5-6)</h4>
                            @if($advancedSection->type == 'html')
                                {!! $advancedSection->content !!}
                            @else
                                {{ $advancedSection->content }}
                            @endif
                        </div>
                    @endif
                    
                    <!-- Additional Fees -->
                    @if($additionalSection)
                        <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                            <h4 class="mb-4">Additional Fees and Charges</h4>
                            @if($additionalSection->type == 'html')
                                {!! $additionalSection->content !!}
                            @else
                                {{ $additionalSection->content }}
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    
    <!-- Payment Information -->
    <div class="row mb-5">
        @php
            $paymentMethodsSection = $page->sections->where('identifier', 'payment_methods')->first();
            $paymentScheduleSection = $page->sections->where('identifier', 'payment_schedule')->first();
        @endphp
        
        @if($paymentMethodsSection)
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        @if($paymentMethodsSection->type == 'html')
                            {!! $paymentMethodsSection->content !!}
                        @else
                            {{ $paymentMethodsSection->content }}
                        @endif
                    </div>
                </div>
            </div>
        @endif
        
        @if($paymentScheduleSection)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Payment Schedule</h4>
                    </div>
                    <div class="card-body">
                        @if($paymentScheduleSection->type == 'html')
                            {!! $paymentScheduleSection->content !!}
                        @else
                            {{ $paymentScheduleSection->content }}
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    <!-- Scholarships and Financial Aid -->
    @php
        $scholarshipsSection = $page->sections->where('identifier', 'scholarships')->first();
    @endphp
    
    @if($scholarshipsSection)
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Scholarships and Financial Aid</h4>
            </div>
            <div class="card-body">
                @if($scholarshipsSection->type == 'html')
                    {!! $scholarshipsSection->content !!}
                @else
                    {{ $scholarshipsSection->content }}
                @endif
            </div>
        </div>
    @endif
    
    <!-- FAQ Section -->
    @php
        $faqSection = $page->sections->where('identifier', 'faq')->first();
    @endphp
    
    @if($faqSection)
        <div class="mb-5">
            <h2 class="mb-4">Frequently Asked Questions</h2>
            @if($faqSection->type == 'html')
                {!! $faqSection->content !!}
            @elseif($faqSection->type == 'accordion')
                <div class="accordion" id="feesFAQ">
                    {!! $faqSection->content !!}
                </div>
            @else
                {{ $faqSection->content }}
            @endif
        </div>
    @endif
    
    <!-- Other Sections -->
    @foreach($page->sections as $section)
        @if(!in_array($section->identifier, ['introduction', 'important_info', 'fee_tabs', 'ordinary_level', 'advanced_level', 'additional_fees', 'payment_methods', 'payment_schedule', 'scholarships', 'faq']))
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
