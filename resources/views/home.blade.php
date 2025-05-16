@extends('layouts.app')

@section('title', 'Home - Embeko Secondary School')

@section('content')
    <div class="container-fluid">
        <div class="card bg-primary text-white border-0 shadow mt-4">
            <div class="card-body p-5 text-center">
                <h2 class="mb-3 fw-bold">Welcome to EMBEKO SECONDARY SCHOOL</h2>
                <p class="lead mb-4">
                    Learn more about our school, our academics, our programs, our staff, and our alumni.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('page.show', 'about-us') }}" class="btn btn-lg btn-outline-light">
                        About us
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 d-none d-md-block">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        @include('components.announcement')
                        <div class="row">
                            <div class="col-12 px-4">
                                <a href="{{ route('posts.index') }}">More announcements..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                @include('components.welcome')
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">News</h5>
                        @include('components.news-website')
                        <div class="row">
                            <div class="col-12 px-4">
                                <a href="{{ route('posts.index') }}">More News..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles') @endpush
