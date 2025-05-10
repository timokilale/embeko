@extends('layouts.app')

@section('title', 'Downloads - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Downloads</h1>
    
    <div class="row mb-4">
        <div class="col-md-8">
            <p class="lead">
                Access important documents, forms, and resources for students, parents, and staff.
            </p>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('downloads.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search downloads..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        @forelse($downloads as $download)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm download-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="download-icon me-3">
                                @if(in_array($download->file_type, ['pdf', 'PDF']))
                                    <i class="far fa-file-pdf text-danger"></i>
                                @elseif(in_array($download->file_type, ['doc', 'docx', 'DOC', 'DOCX']))
                                    <i class="far fa-file-word text-primary"></i>
                                @elseif(in_array($download->file_type, ['xls', 'xlsx', 'XLS', 'XLSX']))
                                    <i class="far fa-file-excel text-success"></i>
                                @elseif(in_array($download->file_type, ['ppt', 'pptx', 'PPT', 'PPTX']))
                                    <i class="far fa-file-powerpoint text-warning"></i>
                                @elseif(in_array($download->file_type, ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']))
                                    <i class="far fa-file-image text-info"></i>
                                @elseif(in_array($download->file_type, ['zip', 'rar', 'ZIP', 'RAR']))
                                    <i class="far fa-file-archive text-secondary"></i>
                                @else
                                    <i class="far fa-file text-dark"></i>
                                @endif
                            </div>
                            <h5 class="card-title mb-0">{{ $download->title }}</h5>
                        </div>
                        
                        @if($download->description)
                            <p class="card-text mb-3">{{ Str::limit($download->description, 100) }}</p>
                        @endif
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-1"></i> {{ $download->created_at->format('M d, Y') }}
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-download me-1"></i> {{ $download->download_count }} downloads
                            </small>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-secondary">{{ strtoupper($download->file_type) }}</span>
                            <a href="{{ route('downloads.download', $download->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-download me-1"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No downloads available at the moment.
                    @if(request('search'))
                        Try a different search term.
                    @endif
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $downloads->links() }}
    </div>
    
    <!-- Download Categories -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Download Categories</h3>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-book fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title">Academic Resources</h5>
                    <p class="card-text">Syllabi, course materials, and academic calendars.</p>
                    <a href="{{ route('downloads.index', ['category' => 'academic']) }}" class="btn btn-outline-primary">View Resources</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-file-alt fa-3x text-success"></i>
                    </div>
                    <h5 class="card-title">Forms & Documents</h5>
                    <p class="card-text">Application forms, permission slips, and official documents.</p>
                    <a href="{{ route('downloads.index', ['category' => 'forms']) }}" class="btn btn-outline-success">View Forms</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-calendar-alt fa-3x text-info"></i>
                    </div>
                    <h5 class="card-title">Schedules & Timetables</h5>
                    <p class="card-text">Class schedules, exam timetables, and school calendars.</p>
                    <a href="{{ route('downloads.index', ['category' => 'schedules']) }}" class="btn btn-outline-info">View Schedules</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .download-icon {
        font-size: 2rem;
    }
    .download-card {
        transition: transform 0.3s ease;
    }
    .download-card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush
