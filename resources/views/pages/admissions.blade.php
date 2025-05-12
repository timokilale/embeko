@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? $page->description)

@section('meta_keywords', $page->meta_keywords)

@section('content')
<div class="container py-5">
    @include('admissions')
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
