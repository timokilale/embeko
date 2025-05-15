@extends('layouts.app')

@section('title', 'Exam Results - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Examination Results</h1>

    <div class="row mb-5">
        <div class="col-md-8">
            <p class="lead">
                Access and view examination results for various classes and academic years.
            </p>
        </div>
        <div class="col-md-4">
            <div class="d-flex justify-content-end">
                <a href="{{ route('results.summary') }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-chart-pie me-1"></i> Results Summary
                </a>
                <a href="{{ route('results.overall') }}" class="btn btn-outline-success">
                    <i class="fas fa-chart-line me-1"></i> Overall Performance
                </a>
            </div>
        </div>
    </div>

    <!-- Results Search Form -->
    <!-- <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h4 class="card-title mb-4">Search Examination Results</h4>
            <form action="{{ route('results.show', ['exam' => 'SEARCH', 'year' => 'SEARCH']) }}" method="GET" id="resultsSearchForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="exam" class="form-label">Examination</label>
                        <select class="form-select" id="exam" name="exam" required>
                            <option value="" selected disabled>Select Examination</option>
                            <option value="CSEE">Certificate of Secondary Education Examination (CSEE)</option>
                            <option value="FTNA">Form Two National Assessment (FTNA)</option>
                            <option value="ACSEE">Advanced Certificate of Secondary Education Examination (ACSEE)</option>
                            <option value="MOCK">Mock Examinations</option>
                            <option value="TERMINAL">Terminal Examinations</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="year" class="form-label">Year</label>
                        <select class="form-select" id="year" name="year" required>
                            <option value="" selected disabled>Select Year</option>
                            @for($year = date('Y'); $year >= 2020; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i> Search Results
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <!-- Recent Examination Results -->
    <h3 class="mb-4">Recent Examination Results</h3>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">CSEE Results</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @for($year = date('Y'); $year >= date('Y')-3; $year--)
                            <a href="{{ route('results.show', ['exam' => 'csee', 'year' => $year]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="fas fa-graduation-cap me-2"></i>
                                    CSEE {{ $year }} Results
                                </span>
                                <span class="badge bg-primary rounded-pill">View</span>
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('results.visualize', ['exam' => 'CSEE', 'year' => date('Y')]) }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-chart-bar me-2"></i> Visualize Latest Results
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">FTNA Results</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @for($year = date('Y'); $year >= date('Y')-3; $year--)
                            <a href="{{ route('results.show', ['exam' => 'FTNA', 'year' => $year]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="fas fa-graduation-cap me-2"></i>
                                    FTNA {{ $year }} Results
                                </span>
                                <span class="badge bg-success rounded-pill">View</span>
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('results.visualize', ['exam' => 'FTNA', 'year' => date('Y')]) }}" class="btn btn-outline-success w-100">
                        <i class="fas fa-chart-bar me-2"></i> Visualize Latest Results
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Highlights -->
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Performance Highlights</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3 mb-md-0 text-center">
                    <div class="display-4 fw-bold text-primary">92%</div>
                    <p class="text-muted">CSEE Pass Rate</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0 text-center">
                    <div class="display-4 fw-bold text-success">85%</div>
                    <p class="text-muted">FTNA Pass Rate</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0 text-center">
                    <div class="display-4 fw-bold text-info">15</div>
                    <p class="text-muted">Division I Students</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="display-4 fw-bold text-warning">25</div>
                    <p class="text-muted">National Awards</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Archive -->
    <h3 class="mt-5 mb-4">Results Archive</h3>
    <div class="accordion" id="resultsArchive">
        <!-- CSEE Archive -->
        <div class="accordion-item border-0 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingCSEE">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCSEE" aria-expanded="true" aria-controls="collapseCSEE">
                    <i class="fas fa-graduation-cap me-2"></i> CSEE Results Archive
                </button>
            </h2>
            <div id="collapseCSEE" class="accordion-collapse collapse show" aria-labelledby="headingCSEE" data-bs-parent="#resultsArchive">
                <div class="accordion-body">
                    <div class="row">
                        @for($year = date('Y'); $year >= 2020; $year--)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('results.show', ['exam' => 'CSEE', 'year' => $year]) }}" class="btn btn-outline-primary w-100">
                                    CSEE {{ $year }}
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- FTNA Archive -->
        <div class="accordion-item border-0 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingFTNA">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFTNA" aria-expanded="false" aria-controls="collapseFTNA">
                    <i class="fas fa-graduation-cap me-2"></i> FTNA Results Archive
                </button>
            </h2>
            <div id="collapseFTNA" class="accordion-collapse collapse" aria-labelledby="headingFTNA" data-bs-parent="#resultsArchive">
                <div class="accordion-body">
                    <div class="row">
                        @for($year = date('Y'); $year >= 2020; $year--)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('results.show', ['exam' => 'FTNA', 'year' => $year]) }}" class="btn btn-outline-success w-100">
                                    FTNA {{ $year }}
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Exams Archive -->
        <div class="accordion-item border-0 shadow-sm">
            <h2 class="accordion-header" id="headingOther">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOther" aria-expanded="false" aria-controls="collapseOther">
                    <i class="fas fa-graduation-cap me-2"></i> Other Examinations
                </button>
            </h2>
            <div id="collapseOther" class="accordion-collapse collapse" aria-labelledby="headingOther" data-bs-parent="#resultsArchive">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('results.show', ['exam' => 'MOCK', 'year' => date('Y')]) }}" class="btn btn-outline-info w-100">
                                Mock Examinations {{ date('Y') }}
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('results.show', ['exam' => 'TERMINAL', 'year' => date('Y')]) }}" class="btn btn-outline-info w-100">
                                Terminal Examinations {{ date('Y') }}
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('results.show', ['exam' => 'ACSEE', 'year' => date('Y')]) }}" class="btn btn-outline-info w-100">
                                ACSEE {{ date('Y') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('resultsSearchForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const exam = document.getElementById('exam').value;
            const year = document.getElementById('year').value;
            if (exam && year) {
                window.location.href = "{{ route('results.show', ['exam' => ':exam', 'year' => ':year']) }}".replace(':exam', exam).replace(':year', year);
            }
        });
    });
</script>
@endpush
