@extends('layouts.app')

@section('title', 'Photo Gallery')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Photo Gallery</h2>

        <div class="row g-4">
            @foreach ($images as $image)
                <div class="col-4 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="gallery-item">
                                <img src="{{ asset('storage/gallery/' . $image->filename) }}"
                                     class="img-fluid rounded shadow-sm gallery-thumb"
                                     data-bs-toggle="modal"
                                     data-bs-target="#lightboxModal"
                                     data-bs-image="{{ asset('storage/gallery/' . $image->filename) }}"
                                     alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <img src="" id="lightboxImage" class="img-fluid rounded shadow" alt="Preview">
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .gallery-item {
            overflow: hidden;
            cursor: pointer;
            position: relative;
            transition: transform 0.3s ease;
        }

        .gallery-thumb {
            transition: transform 0.4s ease, opacity 0.4s ease;
            border-radius: 10px;
        }

        .gallery-thumb:hover {
            transform: scale(1.05);
            opacity: 0.85;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            const modalImage = document.getElementById('lightboxImage');

            document.querySelectorAll('.gallery-thumb').forEach(img => {
                img.addEventListener('click', function () {
                    modalImage.src = this.getAttribute('data-bs-image');
                });
            });
        });
    </script>
@endpush
