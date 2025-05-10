@extends('layouts.admin')

@section('title', 'Edit Welcome Message')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Welcome Message</h1>
        <a href="{{ route('admin.welcome-messages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Welcome Messages
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.welcome-messages.update', $welcomeMessage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $welcomeMessage->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content', $welcomeMessage->content) }}</textarea>
                            <div class="form-text">Use the toolbar above to format your content.</div>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="author_name" class="form-label">Author Name</label>
                                    <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name', $welcomeMessage->author_name) }}">
                                    @error('author_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="author_title" class="form-label">Author Title</label>
                                    <input type="text" class="form-control @error('author_title') is-invalid @enderror" id="author_title" name="author_title" value="{{ old('author_title', $welcomeMessage->author_title) }}">
                                    @error('author_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $welcomeMessage->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Set as active welcome message</label>
                            <div class="form-text">Only one welcome message can be active at a time. Setting this as active will deactivate any other active welcome message.</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <div class="mb-3">
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="image-preview bg-light d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; overflow: hidden;">
                                        @if($welcomeMessage->image)
                                            <img id="preview-image" src="{{ asset('storage/' . $welcomeMessage->image) }}" alt="{{ $welcomeMessage->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            <i class="fas fa-image fa-3x text-secondary" id="placeholder-icon" style="display: none;"></i>
                                        @else
                                            <i class="fas fa-image fa-3x text-secondary" id="placeholder-icon"></i>
                                            <img id="preview-image" src="#" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <div class="form-text">Recommended size: 300x300 pixels</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Welcome Message
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
        // Initialize CKEditor
        if (ClassicEditor) {
            ClassicEditor
                .create(document.getElementById('content'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ]
                })
                .then(editor => {
                    // Store the editor instance globally
                    window.welcomeEditor = editor;

                    // Make sure the form submission includes the editor content
                    const form = document.querySelector('form');
                    form.addEventListener('submit', function() {
                        const contentInput = document.getElementById('content');
                        contentInput.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                    // If CKEditor fails, make the textarea visible and usable
                    document.getElementById('content').style.display = 'block';
                });
        }

        // Image preview
        const imageInput = document.getElementById('image');
        const previewImage = document.getElementById('preview-image');
        const placeholderIcon = document.getElementById('placeholder-icon');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    placeholderIcon.style.display = 'none';
                }

                reader.readAsDataURL(this.files[0]);
            } else {
                @if(!$welcomeMessage->image)
                    previewImage.style.display = 'none';
                    placeholderIcon.style.display = 'block';
                @endif
            }
        });
    });
</script>
@endpush
