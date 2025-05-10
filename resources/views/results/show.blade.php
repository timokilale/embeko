@extends('layouts.app')

@section('title', $exam . ' ' . $year . ' Results - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('results.index') }}">Exam Results</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $exam }} {{ $year }}</li>
            </ol>
        </nav>
        <h1 class="mb-3">{{ $exam }} {{ $year }} Results</h1>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-8">
            <p class="lead">
                @if($exam == 'CSEE')
                    Certificate of Secondary Education Examination (CSEE) results for the year {{ $year }}.
                @elseif($exam == 'FTNA')
                    Form Two National Assessment (FTNA) results for the year {{ $year }}.
                @elseif($exam == 'ACSEE')
                    Advanced Certificate of Secondary Education Examination (ACSEE) results for the year {{ $year }}.
                @elseif($exam == 'MOCK')
                    Mock Examination results for the year {{ $year }}.
                @elseif($exam == 'TERMINAL')
                    Terminal Examination results for the year {{ $year }}.
                @else
                    Examination results for {{ $exam }} {{ $year }}.
                @endif
            </p>
        </div>
        <div class="col-md-4">
            <div class="d-flex justify-content-end">
                <a href="{{ route('results.visualize', ['exam' => $exam, 'year' => $year]) }}" class="btn btn-primary">
                    <i class="fas fa-chart-bar me-1"></i> Visualize Data
                </a>
            </div>
        </div>
    </div>
    
    @if($examResult)
        <!-- Results Summary -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Results Summary</h5>
            </div>
            <div class="card-body">
                @if($examResult->summary)
                    <div class="mb-4">
                        {!! nl2br(e($examResult->summary)) !!}
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Total Students</h6>
                                <div class="display-5 fw-bold text-primary">{{ count($examResult->results_data) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Pass Rate</h6>
                                <div class="display-5 fw-bold text-success">
                                    @php
                                        $passCount = 0;
                                        foreach($examResult->results_data as $student) {
                                            if (isset($student['division']) && in_array($student['division'], ['I', 'II', 'III', 'IV'])) {
                                                $passCount++;
                                            }
                                        }
                                        $passRate = count($examResult->results_data) > 0 ? round(($passCount / count($examResult->results_data)) * 100) : 0;
                                    @endphp
                                    {{ $passRate }}%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Division I</h6>
                                <div class="display-5 fw-bold text-info">
                                    @php
                                        $divisionICount = 0;
                                        foreach($examResult->results_data as $student) {
                                            if (isset($student['division']) && $student['division'] === 'I') {
                                                $divisionICount++;
                                            }
                                        }
                                    @endphp
                                    {{ $divisionICount }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Average GPA</h6>
                                <div class="display-5 fw-bold text-warning">
                                    @php
                                        $totalGPA = 0;
                                        $gpaCount = 0;
                                        foreach($examResult->results_data as $student) {
                                            if (isset($student['gpa']) && is_numeric($student['gpa'])) {
                                                $totalGPA += $student['gpa'];
                                                $gpaCount++;
                                            }
                                        }
                                        $averageGPA = $gpaCount > 0 ? round($totalGPA / $gpaCount, 2) : 0;
                                    @endphp
                                    {{ $averageGPA }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Division Distribution -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Division Distribution</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <canvas id="divisionChart" height="250"></canvas>
                    </div>
                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Division</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $divisions = ['I', 'II', 'III', 'IV', '0'];
                                        $divisionCounts = array_fill_keys($divisions, 0);
                                        
                                        foreach($examResult->results_data as $student) {
                                            if (isset($student['division']) && in_array($student['division'], $divisions)) {
                                                $divisionCounts[$student['division']]++;
                                            }
                                        }
                                        
                                        $totalStudents = count($examResult->results_data);
                                    @endphp
                                    
                                    @foreach($divisions as $division)
                                        <tr>
                                            <td>Division {{ $division }}</td>
                                            <td>{{ $divisionCounts[$division] }}</td>
                                            <td>
                                                {{ $totalStudents > 0 ? round(($divisionCounts[$division] / $totalStudents) * 100) : 0 }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Results Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Results</h5>
                <div>
                    <input type="text" id="studentSearch" class="form-control form-control-sm" placeholder="Search by name or exam number...">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="resultsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Exam Number</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Division</th>
                                <th>GPA</th>
                                <th>Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($examResult->results_data as $student)
                                <tr>
                                    <td>{{ $student['exam_number'] ?? 'N/A' }}</td>
                                    <td>{{ $student['name'] ?? 'N/A' }}</td>
                                    <td>{{ $student['gender'] ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if(isset($student['division']))
                                                @if($student['division'] === 'I') bg-success
                                                @elseif($student['division'] === 'II') bg-primary
                                                @elseif($student['division'] === 'III') bg-info
                                                @elseif($student['division'] === 'IV') bg-warning
                                                @else bg-danger
                                                @endif
                                            @else
                                                bg-secondary
                                            @endif
                                        ">
                                            Division {{ $student['division'] ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>{{ $student['gpa'] ?? 'N/A' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#studentModal{{ $loop->index }}">
                                            View Subjects
                                        </button>
                                        
                                        <!-- Student Subjects Modal -->
                                        <div class="modal fade" id="studentModal{{ $loop->index }}" tabindex="-1" aria-labelledby="studentModalLabel{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="studentModalLabel{{ $loop->index }}">
                                                            {{ $student['name'] ?? 'Student' }} - Subject Results
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(isset($student['subjects']) && is_array($student['subjects']))
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Subject</th>
                                                                            <th>Grade</th>
                                                                            <th>Points</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($student['subjects'] as $subject => $result)
                                                                            <tr>
                                                                                <td>{{ $subject }}</td>
                                                                                <td>{{ is_array($result) ? ($result['grade'] ?? 'N/A') : $result }}</td>
                                                                                <td>{{ is_array($result) ? ($result['points'] ?? 'N/A') : 'N/A' }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @else
                                                            <p class="text-center">No subject data available.</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i> No results found for {{ $exam }} {{ $year }}. Please try a different examination or year.
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .card-header {
        font-weight: 600;
    }
    #studentSearch {
        width: 250px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Student search functionality
        const searchInput = document.getElementById('studentSearch');
        const resultsTable = document.getElementById('resultsTable');
        
        if (searchInput && resultsTable) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = resultsTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                
                for (let i = 0; i < rows.length; i++) {
                    const examNumber = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
                    const studentName = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
                    
                    if (examNumber.includes(searchTerm) || studentName.includes(searchTerm)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        }
        
        // Division chart
        const divisionChartEl = document.getElementById('divisionChart');
        if (divisionChartEl) {
            @php
                $divisionLabels = ['Division I', 'Division II', 'Division III', 'Division IV', 'Division 0'];
                $divisionData = [
                    $divisionCounts['I'] ?? 0,
                    $divisionCounts['II'] ?? 0,
                    $divisionCounts['III'] ?? 0,
                    $divisionCounts['IV'] ?? 0,
                    $divisionCounts['0'] ?? 0
                ];
            @endphp
            
            new Chart(divisionChartEl, {
                type: 'bar',
                data: {
                    labels: @json($divisionLabels),
                    datasets: [{
                        label: 'Number of Students',
                        data: @json($divisionData),
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.7)',  // Success
                            'rgba(0, 123, 255, 0.7)',  // Primary
                            'rgba(23, 162, 184, 0.7)', // Info
                            'rgba(255, 193, 7, 0.7)',  // Warning
                            'rgba(220, 53, 69, 0.7)'   // Danger
                        ],
                        borderColor: [
                            'rgba(40, 167, 69, 1)',
                            'rgba(0, 123, 255, 1)',
                            'rgba(23, 162, 184, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(220, 53, 69, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
