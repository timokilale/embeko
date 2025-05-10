@extends('layouts.admin')

@section('title', 'View Exam Result')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Exam Result</h1>
        <div>
            <a href="{{ route('admin.exam-results.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Results
            </a>
            <a href="{{ route('admin.exam-results.edit', $result->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i> Edit Result
            </a>
            @if($result->file_path)
                <a href="{{ asset('storage/' . $result->file_path) }}" class="btn btn-success" target="_blank">
                    <i class="fas fa-download me-2"></i> Download File
                </a>
            @endif
        </div>
    </div>

    <!-- Result Details -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Result Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Result Details</h6>
                </div>
                <div class="card-body">
                    <h2 class="h4 mb-3">{{ $result->exam_name }} - {{ $result->year }}</h2>
                    
                    <div class="mb-4">
                        <strong>Class:</strong> {{ $result->class }}
                    </div>
                    
                    @if($result->student_name)
                        <div class="mb-4">
                            <strong>Student:</strong> {{ $result->student_name }}
                        </div>
                    @else
                        <div class="mb-4">
                            <strong>Students:</strong> All students in {{ $result->class }}
                        </div>
                    @endif
                    
                    @if($result->file_path)
                        <div class="mb-4">
                            <strong>Results File:</strong>
                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $result->file_path) }}" class="btn btn-outline-primary" target="_blank">
                                    <i class="fas fa-file-alt me-2"></i> {{ basename($result->file_path) }}
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    @if($result->results_data)
                        <div class="mb-4">
                            <strong>Results Data:</strong>
                            <div class="mt-3 p-3 border rounded">
                                {!! $result->results_data !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Result Metadata -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Result Information</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Status:</strong>
                            @if($result->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Created:</strong>
                            <span>{{ $result->created_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Last Updated:</strong>
                            <span>{{ $result->updated_at->format('M d, Y H:i') }}</span>
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
                        <a href="{{ route('admin.exam-results.edit', $result->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i> Edit Result
                        </a>
                        
                        @if($result->is_published)
                            <form action="{{ route('admin.exam-results.update', $result->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="exam_name" value="{{ $result->exam_name }}">
                                <input type="hidden" name="year" value="{{ $result->year }}">
                                <input type="hidden" name="class" value="{{ $result->class }}">
                                <input type="hidden" name="student_name" value="{{ $result->student_name }}">
                                <input type="hidden" name="results_data" value="{{ $result->results_data }}">
                                <input type="hidden" name="is_published" value="0">
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="fas fa-eye-slash me-2"></i> Unpublish Result
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.exam-results.update', $result->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="exam_name" value="{{ $result->exam_name }}">
                                <input type="hidden" name="year" value="{{ $result->year }}">
                                <input type="hidden" name="class" value="{{ $result->class }}">
                                <input type="hidden" name="student_name" value="{{ $result->student_name }}">
                                <input type="hidden" name="results_data" value="{{ $result->results_data }}">
                                <input type="hidden" name="is_published" value="1">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-eye me-2"></i> Publish Result
                                </button>
                            </form>
                        @endif
                        
                        <form action="{{ route('admin.exam-results.destroy', $result->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this result?')">
                                <i class="fas fa-trash me-2"></i> Delete Result
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
