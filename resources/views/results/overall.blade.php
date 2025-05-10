@extends('layouts.app')

@section('title', 'Overall Performance - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Overall School Performance</h1>
        <div>
            <a href="{{ route('results.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i> Back to Results
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-8">
            <p class="lead">
                This page shows the overall performance of Embeko Secondary School over the years, including trends, comparisons, and key performance indicators.
            </p>
        </div>
    </div>

    <!-- Performance Trends -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Performance Trends</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5>Pass Rate Trend</h5>
                    <canvas id="passRateChart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6 mb-4">
                    <h5>Division Distribution</h5>
                    <canvas id="divisionChart" width="400" height="300"></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <h5>GPA Trend</h5>
                    <canvas id="gpaChart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6 mb-4">
                    <h5>National Ranking</h5>
                    <canvas id="rankingChart" width="400" height="300"></canvas>
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
                    <h5>Subject Performance Comparison</h5>
                    <canvas id="subjectPerformanceChart" width="800" height="400"></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <h5>Best Performing Subjects</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Year</th>
                                    <th>Exam</th>
                                    <th>Best Subject</th>
                                    <th>Pass Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examResults as $result)
                                    @php
                                        $summary = json_decode($result->summary, true);
                                    @endphp
                                    <tr>
                                        <td>{{ $result->year }}</td>
                                        <td>{{ $result->exam_name }}</td>
                                        <td>{{ $summary['best_subject'] ?? 'N/A' }}</td>
                                        <td>{{ $summary['pass_rate'] ?? 'N/A' }}%</td>
                                    </tr>
                                @endforeach
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
                                    <th>Year</th>
                                    <th>Exam</th>
                                    <th>Challenging Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examResults as $result)
                                    @php
                                        $summary = json_decode($result->summary, true);
                                    @endphp
                                    <tr>
                                        <td>{{ $result->year }}</td>
                                        <td>{{ $result->exam_name }}</td>
                                        <td>{{ $summary['worst_subject'] ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- School Rankings -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">School Rankings</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>Year</th>
                            <th>Exam</th>
                            <th>District Rank</th>
                            <th>Regional Rank</th>
                            <th>National Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examResults as $result)
                            @php
                                $summary = json_decode($result->summary, true);
                            @endphp
                            <tr>
                                <td>{{ $result->year }}</td>
                                <td>{{ $result->exam_name }}</td>
                                <td>{{ $summary['rank_in_district'] ?? 'N/A' }}</td>
                                <td>{{ $summary['rank_in_region'] ?? 'N/A' }}</td>
                                <td>{{ $summary['rank_in_country'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        const rankings = [];
        
        examResults.forEach(result => {
            const summary = JSON.parse(result.summary);
            years.push(result.year);
            passRates.push(summary.pass_rate);
            gpas.push(summary.gpa);
            rankings.push(summary.rank_in_country);
        });
        
        // Pass Rate Chart
        const passRateCtx = document.getElementById('passRateChart').getContext('2d');
        new Chart(passRateCtx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Pass Rate (%)',
                    data: passRates,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.1
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
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Average GPA',
                    data: gpas,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    tension: 0.1
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
        
        // Ranking Chart (inverted for better visualization - lower is better)
        const rankingCtx = document.getElementById('rankingChart').getContext('2d');
        new Chart(rankingCtx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'National Ranking',
                    data: rankings,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 2,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        reverse: true,
                        title: {
                            display: true,
                            text: 'Rank (lower is better)'
                        }
                    }
                }
            }
        });
        
        // Placeholder for other charts
        // In a real implementation, you would parse the results_data to get subject performance data
        // and create more detailed charts
    });
</script>
@endpush
