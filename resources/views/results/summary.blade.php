@extends('layouts.app')

@section('title', 'Results Summary - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Examination Results Summary</h1>
        <div>
            <a href="{{ route('results.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i> Back to Results
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-8">
            <p class="lead">
                This page provides a summary of examination results across different years and examination types.
            </p>
        </div>
    </div>

    <!-- Summary Table -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Results Summary</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Year</th>
                            <th>Examination</th>
                            <th>Class</th>
                            <th>Pass Rate</th>
                            <th>GPA</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($examResults as $result)
                            @php
                                $summary = json_decode($result->summary, true);
                            @endphp
                            <tr>
                                <td>{{ $result->year }}</td>
                                <td>{{ $result->exam_name }}</td>
                                <td>{{ $result->class }}</td>
                                <td>{{ $summary['pass_rate'] ?? 'N/A' }}%</td>
                                <td>{{ $summary['gpa'] ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('results.show', ['exam' => $result->exam_name, 'year' => $result->year]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('results.visualize', ['exam' => $result->exam_name, 'year' => $result->year]) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-chart-bar"></i> Visualize
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No examination results found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Summary Charts -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Pass Rate by Year</h5>
                </div>
                <div class="card-body">
                    <canvas id="passRateChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">GPA by Year</h5>
                </div>
                <div class="card-body">
                    <canvas id="gpaChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Examination Comparison -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Examination Comparison</h4>
        </div>
        <div class="card-body">
            <canvas id="comparisonChart" width="800" height="400"></canvas>
        </div>
    </div>

    <!-- Best Performing Classes -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Best Performing Classes</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse($examResults->sortByDesc(function($result) {
                    $summary = json_decode($result->summary, true);
                    return $summary['pass_rate'] ?? 0;
                })->take(3) as $result)
                    @php
                        $summary = json_decode($result->summary, true);
                    @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $result->class }} - {{ $result->year }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $result->exam_name }}</h6>
                                <div class="display-4 fw-bold text-primary mb-3">{{ $summary['pass_rate'] ?? 'N/A' }}%</div>
                                <p class="card-text">
                                    <strong>GPA:</strong> {{ $summary['gpa'] ?? 'N/A' }}<br>
                                    <strong>Best Subject:</strong> {{ $summary['best_subject'] ?? 'N/A' }}<br>
                                    <strong>National Rank:</strong> {{ $summary['rank_in_country'] ?? 'N/A' }}
                                </p>
                                <a href="{{ route('results.show', ['exam' => $result->exam_name, 'year' => $result->year]) }}" class="btn btn-primary">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No examination results found.</p>
                    </div>
                @endforelse
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
        const examResults = @json($examResults);
        
        // Prepare data for charts
        const years = [];
        const passRates = [];
        const gpas = [];
        const examTypes = [];
        
        // Group by year and exam type
        const groupedData = {};
        
        examResults.forEach(result => {
            const summary = JSON.parse(result.summary);
            const year = result.year;
            const examName = result.exam_name;
            
            if (!years.includes(year)) {
                years.push(year);
            }
            
            if (!examTypes.includes(examName)) {
                examTypes.push(examName);
            }
            
            if (!groupedData[examName]) {
                groupedData[examName] = {};
            }
            
            groupedData[examName][year] = {
                passRate: summary.pass_rate,
                gpa: summary.gpa
            };
            
            passRates.push(summary.pass_rate);
            gpas.push(summary.gpa);
        });
        
        // Sort years
        years.sort();
        
        // Pass Rate Chart
        const passRateCtx = document.getElementById('passRateChart').getContext('2d');
        new Chart(passRateCtx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Pass Rate (%)',
                    data: years.map(year => {
                        // Average pass rate for each year across all exam types
                        let sum = 0;
                        let count = 0;
                        
                        examTypes.forEach(examType => {
                            if (groupedData[examType] && groupedData[examType][year]) {
                                sum += groupedData[examType][year].passRate;
                                count++;
                            }
                        });
                        
                        return count > 0 ? sum / count : 0;
                    }),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 80,
                        max: 100
                    }
                }
            }
        });
        
        // GPA Chart
        const gpaCtx = document.getElementById('gpaChart').getContext('2d');
        new Chart(gpaCtx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Average GPA',
                    data: years.map(year => {
                        // Average GPA for each year across all exam types
                        let sum = 0;
                        let count = 0;
                        
                        examTypes.forEach(examType => {
                            if (groupedData[examType] && groupedData[examType][year]) {
                                sum += groupedData[examType][year].gpa;
                                count++;
                            }
                        });
                        
                        return count > 0 ? sum / count : 0;
                    }),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 2,
                        max: 5
                    }
                }
            }
        });
        
        // Comparison Chart
        const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
        new Chart(comparisonCtx, {
            type: 'line',
            data: {
                labels: years,
                datasets: examTypes.map((examType, index) => {
                    const colors = [
                        { bg: 'rgba(75, 192, 192, 0.2)', border: 'rgba(75, 192, 192, 1)' },
                        { bg: 'rgba(153, 102, 255, 0.2)', border: 'rgba(153, 102, 255, 1)' },
                        { bg: 'rgba(255, 159, 64, 0.2)', border: 'rgba(255, 159, 64, 1)' },
                        { bg: 'rgba(255, 99, 132, 0.2)', border: 'rgba(255, 99, 132, 1)' }
                    ];
                    
                    const colorIndex = index % colors.length;
                    
                    return {
                        label: `${examType} Pass Rate`,
                        data: years.map(year => {
                            return groupedData[examType] && groupedData[examType][year] 
                                ? groupedData[examType][year].passRate 
                                : null;
                        }),
                        backgroundColor: colors[colorIndex].bg,
                        borderColor: colors[colorIndex].border,
                        borderWidth: 2,
                        tension: 0.1
                    };
                })
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 80,
                        max: 100
                    }
                }
            }
        });
    });
</script>
@endpush
