@extends('layouts.admin')

@section('title', 'View Download')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Download</h1>
        <div>
            <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Downloads
            </a>
            <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i> Edit Download
            </a>
            <a href="{{ route('downloads.download', $download->id) }}" class="btn btn-success" target="_blank">
                <i class="fas fa-download me-2"></i> Download File
            </a>
        </div>
    </div>

    <!-- Download Details -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Download Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Download Information</h6>
                </div>
                <div class="card-body">
                    <h2 class="h4 mb-3">{{ $download->title }}</h2>
                    
                    @if($download->description)
                        <div class="mb-4">
                            <strong>Description:</strong>
                            <p class="mt-2">{{ $download->description }}</p>
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <strong>File:</strong>
                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    @php
                                        $fileType = strtolower($download->file_type ?? '');
                                        $iconClass = 'fa-file';
                                        
                                        if (in_array($fileType, ['pdf'])) {
                                            $iconClass = 'fa-file-pdf';
                                        } elseif (in_array($fileType, ['doc', 'docx'])) {
                                            $iconClass = 'fa-file-word';
                                        } elseif (in_array($fileType, ['xls', 'xlsx'])) {
                                            $iconClass = 'fa-file-excel';
                                        } elseif (in_array($fileType, ['ppt', 'pptx'])) {
                                            $iconClass = 'fa-file-powerpoint';
                                        } elseif (in_array($fileType, ['zip', 'rar'])) {
                                            $iconClass = 'fa-file-archive';
                                        } elseif (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                            $iconClass = 'fa-file-image';
                                        }
                                    @endphp
                                    <i class="fas {{ $iconClass }} fa-3x text-primary"></i>
                                </div>
                                <div>
                                    <p class="mb-1">{{ basename($download->file_path) }}</p>
                                    <p class="mb-0 text-muted">
                                        {{ strtoupper($download->file_type ?? 'Unknown') }} | 
                                        {{ $download->file_size ? round($download->file_size / 1024, 2) . ' KB' : 'Unknown size' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <a href="{{ route('downloads.download', $download->id) }}" class="btn btn-success" target="_blank">
                            <i class="fas fa-download me-2"></i> Download File
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Download Metadata -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Download Details</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Category:</strong>
                            <span>{{ ucfirst($download->category_type ?? 'Uncategorized') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>File Type:</strong>
                            <span>{{ strtoupper($download->file_type ?? 'Unknown') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>File Size:</strong>
                            <span>{{ $download->file_size ? round($download->file_size / 1024, 2) . ' KB' : 'Unknown' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Download Count:</strong>
                            <span class="badge bg-primary rounded-pill">{{ $download->download_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Created:</strong>
                            <span>{{ $download->created_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Last Updated:</strong>
                            <span>{{ $download->updated_at->format('M d, Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit Download
                        </a>
                        <form action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this download?')">
                                <i class="fas fa-trash me-2"></i> Delete Download
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
