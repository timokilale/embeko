@extends('layouts.admin')

@section('title', 'Edit Download')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Download</h1>
        <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Downloads
        </a>
    </div>

    <!-- Edit Download Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Download Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $download->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $download->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="category_type" class="form-label">Category</label>
                    <input type="text" class="form-control @error('category_type') is-invalid @enderror" id="category_type" name="category_type" value="{{ old('category_type', $download->category_type) }}" list="category-suggestions">
                    <datalist id="category-suggestions">
                        <option value="forms">Forms</option>
                        <option value="documents">Documents</option>
                        <option value="brochures">Brochures</option>
                        <option value="newsletters">Newsletters</option>
                        <option value="scholarships">Scholarships</option>
                        <option value="academic">Academic</option>
                    </datalist>
                    @error('category_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Enter a category for organizing downloads (e.g., forms, documents, brochures)</div>
                </div>
                
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    @if($download->file_path)
                        <div class="mb-2">
                            <strong>Current File:</strong> 
                            <a href="{{ route('downloads.download', $download->id) }}" target="_blank">
                                {{ basename($download->file_path) }}
                                ({{ strtoupper($download->file_type ?? 'Unknown') }}, 
                                {{ $download->file_size ? round($download->file_size / 1024, 2) . ' KB' : 'Unknown size' }})
                            </a>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Leave empty to keep the current file. Maximum file size: 10MB.</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Download Statistics</label>
                    <div class="input-group">
                        <span class="input-group-text">Download Count</span>
                        <input type="text" class="form-control" value="{{ $download->download_count }}" readonly>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Update Download</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
