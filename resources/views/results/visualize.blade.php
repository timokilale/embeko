@extends('layouts.app')

@section('title', $exam . ' ' . $year . ' Visualization - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $exam }} {{ $year }} Results Visualization</h1>
        <div>
            <a href="{{ route('results.show', ['exam' => $exam, 'year' => $year]) }}" class="btn btn-outline-primary me-2">
                <i class="fas fa-table me-2"></i> View Results Table
            </a>
            <a href="{{ route('results.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Results
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-8">
            <p class="lead">
                Visual representation of the {{ $exam }} examination results for the year {{ $year }}.
            </p>
        </div>
    </div>

    <!-- Performance Overview -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Performance Overview</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5>Division Distribution</h5>
                    <canvas id="divisionChart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6 mb-4">
                    <h5>Pass/Fail Distribution</h5>
                    <canvas id="passFailChart" width="400" height="300"></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Key Performance Indicators</h5>
                    <div class="row">
                        @php
                            $summary = json_decode($examResult->summary, true);
                            $resultsData = json_decode($examResult->results_data, true);
                            $totalStudents = $resultsData['total_students'] ?? 0;
                            $passRate = $summary['pass_rate'] ?? 0;
                            $gpa = $summary['gpa'] ?? 0;
                            $bestSubject = $summary['best_subject'] ?? 'N/A';
                            $worstSubject = $summary['worst_subject'] ?? 'N/A';
                        @endphp
                        <div class="col-md-3 mb-3 text-center">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="text-primary mb-0">{{ $totalStudents }}</h3>
                                    <p class="text-muted">Total Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 text-center">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="text-success mb-0">{{ $passRate }}%</h3>
                                    <p class="text-muted">Pass Rate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 text-center">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="text-info mb-0">{{ $gpa }}</h3>
                                    <p class="text-muted">Average GPA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 text-center">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="text-warning mb-0">{{ $summary['rank_in_country'] ?? 'N/A' }}</h3>
                                    <p class="text-muted">National Rank</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subject Performance -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Subject Performance</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h5>Grade Distribution by Subject</h5>
                    <canvas id="subjectGradesChart" width="800" height="400"></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <h5>Best Performing Subjects</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Subject</th>
                                    <th>A Grade %</th>
                                    <th>Pass Rate %</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($resultsData['subjects']))
                                    @foreach(collect($resultsData['subjects'])->sortByDesc(function($grades) {
                                        return ($grades['A'] ?? 0);
                                    })->take(5) as $subject => $grades)
                                        <tr>
                                            <td>{{ $subject }}</td>
                                            <td>{{ ($grades['A'] / $totalStudents) * 100 }}%</td>
                                            <td>{{ (($grades['A'] + $grades['B'] + $grades['C'] + $grades['D']) / $totalStudents) * 100 }}%</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No subject data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <h5>Areas for Improvement</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Subject</th>
                                    <th>F Grade %</th>
                                    <th>Pass Rate %</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($resultsData['subjects']))
                                    @foreach(collect($resultsData['subjects'])->sortByDesc(function($grades) {
                                        return ($grades['F'] ?? 0);
                                    })->take(5) as $subject => $grades)
                                        <tr>
                                            <td>{{ $subject }}</td>
                                            <td>{{ ($grades['F'] / $totalStudents) * 100 }}%</td>
                                            <td>{{ (($grades['A'] + $grades['B'] + $grades['C'] + $grades['D']) / $totalStudents) * 100 }}%</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No subject data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comparison with Previous Years -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Historical Comparison</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">
                Comparing {{ $exam }} {{ $year }} results with previous years' performance.
            </p>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5>Pass Rate Trend</h5>
                    <canvas id="passRateTrendChart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6 mb-4">
                    <h5>GPA Trend</h5>
                    <canvas id="gpaTrendChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data from the server
        const examResult = @json($examResult);
        const resultsData = JSON.parse(examResult.results_data);
        const summary = JSON.parse(examResult.summary);
        
        // Division Distribution Chart
        const divisionCtx = document.getElementById('divisionChart').getContext('2d');
        new Chart(divisionCtx, {
            type: 'pie',
            data: {
                labels: ['Division I', 'Division II', 'Division III', 'Division IV', 'Division 0'],
                datasets: [{
                    data: [
                        resultsData.division_1 || 0,
                        resultsData.division_2 || 0,
                        resultsData.division_3 || 0,
                        resultsData.division_4 || 0,
                        resultsData.division_0 || 0
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
        
        // Pass/Fail Chart
        const passFailCtx = document.getElementById('passFailChart').getContext('2d');
        const passCount = resultsData.total_students - resultsData.division_0;
        const failCount = resultsData.division_0;
        
        new Chart(passFailCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pass', 'Fail'],
                datasets: [{
                    data: [passCount, failCount],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
        
        // Subject Grades Chart (placeholder - in a real implementation, you would parse the subjects data)
        if (resultsData.subjects) {
            const subjectGradesCtx = document.getElementById('subjectGradesChart').getContext('2d');
            const subjects = Object.keys(resultsData.subjects);
            
            new Chart(subjectGradesCtx, {
                type: 'bar',
                data: {
                    labels: subjects,
                    datasets: [
                        {
                            label: 'A',
                            data: subjects.map(subject => resultsData.subjects[subject].A),
                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                            stack: 'Stack 0'
                        },
                        {
                            label: 'B',
                            data: subjects.map(subject => resultsData.subjects[subject].B),
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            stack: 'Stack 0'
                        },
                        {
                            label: 'C',
                            data: subjects.map(subject => resultsData.subjects[subject].C),
                            backgroundColor: 'rgba(255, 206, 86, 0.7)',
                            stack: 'Stack 0'
                        },
                        {
                            label: 'D',
                            data: subjects.map(subject => resultsData.subjects[subject].D),
                            backgroundColor: 'rgba(255, 159, 64, 0.7)',
                            stack: 'Stack 0'
                        },
                        {
                            label: 'F',
                            data: subjects.map(subject => resultsData.subjects[subject].F),
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            stack: 'Stack 0'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        }
        
        // Placeholder for historical trend charts
        // In a real implementation, you would fetch historical data and create these charts
    });
</script>
@endpush
