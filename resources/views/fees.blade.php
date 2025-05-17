@extends('layouts.app')

@section('title', 'Fees Structure - Embeko Secondary School')

@section('content')
    <div class="container py-5">
        <h3 class="text-primary">School Fee Structure</h3>
        {{-- ... header cards ... --}}

        @php
            $y = date('Y',time());
            $year = App\Models\Year::where('year', $y)->first()->year;
            $grades = \App\Models\Form::all();
        @endphp

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-white">
                <ul class="nav nav-tabs card-header-tabs" id="feeTabs" role="tablist">
                    @foreach($grades as $i => $grade)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($i===0) active @endif"
                                    id="grade-{{ $grade->id }}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#grade-{{ $grade->id }}"
                                    type="button"
                                    role="tab"
                                    aria-controls="grade-{{ $grade->id }}"
                                    aria-selected="{{ $i===0 ? 'true' : 'false' }}">
                                {{ $grade->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="feeTabsContent">
                    @foreach($grades as $i => $grade)
                        <div class="tab-pane fade @if($i===0) show active @endif"
                             id="grade-{{ $grade->id }}"
                             role="tabpanel"
                             aria-labelledby="grade-{{ $grade->id }}-tab">

                            <h4 class="mb-4">{{ $grade->name }} Fees Structure — {{ $year }}</h4>

                            {{-- Fee Items --}}
                            <div class="table-responsive mb-4">
                                @if($grade->fees->count())
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-primary">
                                        <tr>
                                            <th>Fee Item</th>
                                            <th>Amount (TZS)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($grade->fees as $fee)
                                            <tr>
                                                <td>{{ $fee->name }}</td>
                                                <td>TSh. {{ number_format($fee->amount) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="table-light">
                                        <tr class="bg-light-subtle">
                                            <th>Total</th>
                                            <th>TSh. {{ number_format($grade->fees->sum('amount')) }}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-warning">
                                        No fees defined for {{ $grade->name }} in {{ $year }}.
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Payment Schedule Section --}}
        <h3 class="text-primary">School Fee Structure</h3>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <ul class="nav nav-tabs card-header-tabs" id="scheduleTabs" role="tablist">
                    @foreach($grades as $i => $grade)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($i===0) active @endif"
                                    id="schedule-{{ $grade->id }}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#schedule-{{ $grade->id }}"
                                    type="button"
                                    role="tab"
                                    aria-controls="schedule-{{ $grade->id }}"
                                    aria-selected="{{ $i===0 ? 'true' : 'false' }}">
                                {{ $grade->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="scheduleTabsContent">
                    @foreach($grades as $i => $grade)
                        <div class="tab-pane fade @if($i===0) show active @endif"
                             id="schedule-{{ $grade->id }}"
                             role="tabpanel"
                             aria-labelledby="schedule-{{ $grade->id }}-tab">

                            <h4 class="mb-4">{{ $grade->name }} Payment Schedule — {{ $year }}</h4>

                            {{-- Replace below with actual payment schedule --}}
                            @php
                                // Dummy data structure: adjust based on your actual relationships
                                $schedules = $grade->paymentSchedules;
                            @endphp

                            @if($schedules->count())
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-success">
                                        <tr>
                                            <th>Installment</th>
                                            <th>Amount (TZS)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($schedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->title ?? 'Installment ' . $loop->iteration }}</td>
                                                <td>TSh. {{ number_format($schedule->amount) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="1">Total</th>
                                            <th>TSh. {{ number_format($schedules->sum('amount')) }}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No payment schedule defined for {{ $grade->name }}.
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- …rest of the page (scholarships, FAQs) unchanged… --}}
    </div>
@endsection
