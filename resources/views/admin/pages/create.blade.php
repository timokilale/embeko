@extends('layouts.admin')

@section('title', 'Create New Page')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Create New Page</h1>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Pages
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Page Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="layout_display" class="form-label">Page Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="layout_display" onchange="updateLayout()">
                                <option value="default">Standard Page</option>
                                <option value="fees">Fees Structure Page</option>
                                <option value="about">About Us Page</option>
                                <option value="contact">Contact Page</option>
                                <option value="academics">Academics Page</option>
                                <option value="admissions">Admissions Page</option>
                            </select>
                            <small class="form-text text-muted">Select the type of page you want to create</small>
                            <input type="hidden" name="layout" id="layout" value="default">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Page Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Publish this page</label>
                </div>

                <!-- Hidden SEO fields - will be auto-populated -->
                <input type="hidden" name="meta_title" id="meta_title" value="">
                <input type="hidden" name="meta_description" id="meta_description" value="">
                <input type="hidden" name="meta_keywords" id="meta_keywords" value="">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Page
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the layout value
        updateLayout();

        // Set up event listener for title changes to update meta title
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('meta_title').value = this.value;
        });

        // Set up event listener for description changes to update meta description
        document.getElementById('description').addEventListener('input', function() {
            document.getElementById('meta_description').value = this.value;
        });
    });

    function updateLayout() {
        const layoutDisplay = document.getElementById('layout_display');
        const layoutValue = layoutDisplay.value;
        document.getElementById('layout').value = layoutValue;

        // Update keywords based on layout
        let keywords = '';
        switch(layoutValue) {
            case 'fees':
                keywords = 'fees, tuition, school fees, payment, scholarship';
                break;
            case 'about':
                keywords = 'about, history, mission, vision, values, school, education';
                break;
            case 'contact':
                keywords = 'contact, email, phone, address, location, map, inquiry';
                break;
            case 'academics':
                keywords = 'academics, curriculum, subjects, programs, education, learning, teaching';
                break;
            case 'admissions':
                keywords = 'admissions, apply, enrollment, registration, entry requirements, school application';
                break;
            default:
                keywords = 'school, education, learning, students';
        }

        document.getElementById('meta_keywords').value = keywords;
    }
</script>
@endpush
