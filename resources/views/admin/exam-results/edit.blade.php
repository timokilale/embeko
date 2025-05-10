@extends('layouts.admin')

@section('title', 'Edit Exam Result')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Exam Result</h1>
        <div>
            <a href="{{ route('admin.exam-results.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Back to Results
            </a>
            <a href="{{ route('admin.exam-results.show', $result->id) }}" class="btn btn-info">
                <i class="fas fa-eye me-2"></i> View Result
            </a>
        </div>
    </div>

    <!-- Edit Exam Result Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exam Result Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.exam-results.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exam_name" class="form-label">Exam Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('exam_name') is-invalid @enderror" id="exam_name" name="exam_name" value="{{ old('exam_name', $result->exam_name) }}" list="exam-suggestions" required>
                        <datalist id="exam-suggestions">
                            <option value="CSEE">Certificate of Secondary Education Examination</option>
                            <option value="ACSEE">Advanced Certificate of Secondary Education Examination</option>
                            <option value="Form 1 Mid-Term">Form 1 Mid-Term Examination</option>
                            <option value="Form 1 Final">Form 1 Final Examination</option>
                            <option value="Form 2 Mid-Term">Form 2 Mid-Term Examination</option>
                            <option value="Form 2 Final">Form 2 Final Examination</option>
                            <option value="Form 3 Mid-Term">Form 3 Mid-Term Examination</option>
                            <option value="Form 3 Final">Form 3 Final Examination</option>
                            <option value="Form 4 Mock">Form 4 Mock Examination</option>
                            <option value="Form 5 Mid-Term">Form 5 Mid-Term Examination</option>
                            <option value="Form 5 Final">Form 5 Final Examination</option>
                            <option value="Form 6 Mock">Form 6 Mock Examination</option>
                        </datalist>
                        @error('exam_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="year" class="form-label">Year <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $result->year) }}" min="2000" max="{{ date('Y') + 1 }}" required>
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="class" class="form-label">Class <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" value="{{ old('class', $result->class) }}" list="class-suggestions" required>
                        <datalist id="class-suggestions">
                            <option value="Form 1">Form 1</option>
                            <option value="Form 2">Form 2</option>
                            <option value="Form 3">Form 3</option>
                            <option value="Form 4">Form 4</option>
                            <option value="Form 5">Form 5</option>
                            <option value="Form 6">Form 6</option>
                            <option value="Form 1A">Form 1A</option>
                            <option value="Form 1B">Form 1B</option>
                            <option value="Form 2A">Form 2A</option>
                            <option value="Form 2B">Form 2B</option>
                        </datalist>
                        @error('class')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" value="{{ old('student_name', $result->student_name) }}">
                    @error('student_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Leave empty if this result is for the entire class</div>
                </div>

                <div class="mb-3">
                    <label for="results_file" class="form-label">Results File</label>
                    @if($result->file_path)
                        <div class="mb-2">
                            <strong>Current File:</strong>
                            <a href="{{ asset('storage/' . $result->file_path) }}" target="_blank">
                                {{ basename($result->file_path) }}
                            </a>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('results_file') is-invalid @enderror" id="results_file" name="results_file">
                    @error('results_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Upload a new file to replace the current one. Maximum file size: 10MB.</div>
                </div>

                <div class="mb-3">
                    <label for="results_data" class="form-label">Results Data</label>
                    <textarea class="form-control @error('results_data') is-invalid @enderror" id="results_data" name="results_data" rows="10">{{ old('results_data', $result->results_data) }}</textarea>
                    @error('results_data')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Enter the results data directly if not using a file. You can use HTML formatting.</div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" {{ old('is_published', $result->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Publish Result</label>
                    <div class="form-text">If checked, the result will be visible to students and parents on the website</div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Update Result</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize rich text editor for results data
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#results_data'))
                .then(editor => {
                    // Store the editor instance
                    window.resultsDataEditor = editor;

                    // Update the hidden field before form submission
                    const form = document.querySelector('form');
                    form.addEventListener('submit', function() {
                        const resultsDataField = document.querySelector('#results_data');
                        resultsDataField.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>
@endpush
