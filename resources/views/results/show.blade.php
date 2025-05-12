@extends('layouts.app')
@section('title', $exam . ' ' . $year . ' Results - Embeko Secondary School')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">{{ strtoupper($exam) }} {{ $year }} Examination Results</h1>

        <section class="my-4">
            <h2>Select Examination Type and Year</h2>
            <form method="GET" action="{{ route('results.show', ['exam' => request('exam'), 'year' => request('year')]) }}"
                class="form-row align-items-center">
                <div class="col-auto">
                    <label for="examType" class="sr-only">Examination Type</label>
                    <select id="examType" name="exam" class="form-control mb-2" required>
                        <option value="">Select Examination Type</option>
                        <option value="csee" {{ request('exam') === 'csee' ? 'selected' : '' }}>CSEE</option>
                        <option value="ftna" {{ request('exam') === 'ftna' ? 'selected' : '' }}>FTNA</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="year" class="sr-only">Year</label>
                    <select id="year" name="year" class="form-control mb-2" required>
                        <option value="">Select Year</option>
                        @foreach([2022, 2023, 2024] as $y)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col- justify-content-between align-baseline">
                    <button type="submit" class="btn btn-primary mb-2 mx-3">
                        Fetch Results
                    </button>
                </div>
            </form>
        </section>

        @if(empty($examData))
            <p class="text-danger">No results found for the selected exam and year.</p>
        @endif

        @if(isset($examData) && count($examData))
            <section class="my-4">
                <h2>Division Performance Summary</h2>
                @php
                    $divisionPerformance = [
                        'female' => [0, 0, 0, 0, 0, 0],
                        'male' => [0, 0, 0, 0, 0, 0],
                        'total' => [0, 0, 0, 0, 0, 0]
                    ];

                    $romanToNumber = ["I" => 1, "II" => 2, "III" => 3, "IV" => 4, "0" => 0];

                    foreach ($examData as $result) {
                        $sex = strtolower(trim($result['column2']));

                        if ($result['column5'] === "ABS") {
                            $divisionPerformance[$sex === 'f' ? 'female' : 'male'][5]++;
                            $divisionPerformance['total'][5]++;
                            continue;
                        }

                        $division = $romanToNumber[$result['column4']] ?? 0;
                        $index = $division === 0 ? 4 : $division - 1;

                        $divisionPerformance[$sex === 'f' ? 'female' : 'male'][$index]++;
                        $divisionPerformance['total'][$index]++;
                    }
                @endphp
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sex</th>
                            <th>Division I</th>
                            <th>Division II</th>
                            <th>Division III</th>
                            <th>Division IV</th>
                            <th>Division 0</th>
                            <th>ABS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Female</td>
                            <td>{{ $divisionPerformance['female'][0] }}</td>
                            <td>{{ $divisionPerformance['female'][1] }}</td>
                            <td>{{ $divisionPerformance['female'][2] }}</td>
                            <td>{{ $divisionPerformance['female'][3] }}</td>
                            <td>{{ $divisionPerformance['female'][4] }}</td>
                            <td>{{ $divisionPerformance['female'][5] }}</td>
                        </tr>
                        <tr>
                            <td>Male</td>
                            <td>{{ $divisionPerformance['male'][0] }}</td>
                            <td>{{ $divisionPerformance['male'][1] }}</td>
                            <td>{{ $divisionPerformance['male'][2] }}</td>
                            <td>{{ $divisionPerformance['male'][3] }}</td>
                            <td>{{ $divisionPerformance['male'][4] }}</td>
                            <td>{{ $divisionPerformance['male'][5] }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{ $divisionPerformance['total'][0] }}</td>
                            <td>{{ $divisionPerformance['total'][1] }}</td>
                            <td>{{ $divisionPerformance['total'][2] }}</td>
                            <td>{{ $divisionPerformance['total'][3] }}</td>
                            <td>{{ $divisionPerformance['total'][4] }}</td>
                            <td>{{ $divisionPerformance['total'][5] }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="my-4">
                <h2>Detailed Student Results</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>CNO</th>
                            <th>SEX</th>
                            <th>AGGT</th>
                            <th>DIV</th>
                            <th>DETAILED SUBJECTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examData as $result)
                            <tr>
                                <td>{{ $result['column1'] }}</td>
                                <td>{{ $result['column2'] === 'M' ? 'Male' : 'Female' }}</td>
                                <td>{{ $result['column3'] === 'ABS' ? 'N/A' : $result['column3'] }}</td>
                                <td>{{ $result['column4'] === 'ABS' ? 'N/A' : $result['column4'] }}</td>
                                <td>{{ $result['column5'] === 'ABS' ? 'Absent' : $result['column5'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        @endif
    </div>
@endsection