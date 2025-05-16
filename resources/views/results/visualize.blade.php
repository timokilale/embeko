@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <results-visualize exam="{{$exam}}" year="{{$year}}"></results-visualize>
    </div>
@endsection
