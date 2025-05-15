@extends('layouts.admin')

@section('title', 'Manage Gallery Images')

@section('content')
    <div class="container py-5">
        <div class="flex-row justify-content-between mb-4">
            <h2 class="mb-4">Manage Gallery Images</h2>
            <a href="{{route('admin.gallery.create')}}" class="btn btn-primary btn-lg btn-outline-dark text-white">
                Upload Photos
            </a>
        </div>
        @if($images->isEmpty())
            <div class="alert alert-info">No images uploaded yet.</div>
        @else
            <div class="row g-4">
                @foreach($images as $image)
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card shadow-sm position-relative">
                            <img src="{{ asset('storage/gallery/' . $image->filename) }}" class="card-img-top" alt="Image">
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" class="position-absolute top-0 end-0 m-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
