@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Posts
            </a>
            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info" target="_blank">
                <i class="fas fa-eye me-2"></i> View Post
            </a>
        </div>
    </div>

    <!-- Edit Post Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            @if($post->featured_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Recommended size: 1200x630 pixels</div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Publish Date</label>
                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to use current date when publishing</div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize rich text editor for content
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#content'))
                .then(editor => {
                    // Store the editor instance
                    window.editor = editor;

                    // Create a hidden input to store CKEditor data
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'content_ck';
                    hiddenInput.id = 'content_ck';
                    document.querySelector('form').appendChild(hiddenInput);

                    // Make the original textarea not required to avoid validation issues
                    // The actual content will be in our hidden input
                    const contentField = document.querySelector('#content');
                    contentField.removeAttribute('required');

                    // Update content on editor change
                    editor.model.document.on('change:data', () => {
                        hiddenInput.value = editor.getData();
                        contentField.value = editor.getData();

                        // Manually trigger validation if the field is empty
                        if (editor.getData() === '') {
                            contentField.setCustomValidity('This field is required');
                        } else {
                            contentField.setCustomValidity('');
                        }
                    });

                    // Initialize with current data
                    hiddenInput.value = editor.getData();

                    // Update the content field before form submission
                    const form = document.querySelector('form');
                    form.addEventListener('submit', function(e) {
                        // Get data from editor and update both fields
                        const editorData = editor.getData();
                        hiddenInput.value = editorData;
                        contentField.value = editorData;

                        // Validate content
                        if (editorData === '') {
                            e.preventDefault();
                            alert('Content field is required');
                            return false;
                        }
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>
@endpush
