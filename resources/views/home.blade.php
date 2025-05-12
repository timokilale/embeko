@extends('layouts.app')

@section('title', 'Home - Embeko Secondary School')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 d-none d-md-block">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        @include('components.announcement')
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <img src="{{ asset('images/cover.jpg') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
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
            <div class="col-12 d-md-none d-sm-block">
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
            <div class="col-md-3 col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">News</h5>
                        @include('components.news-website')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection