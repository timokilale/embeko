@extends('layouts.admin')

@section('title', 'Assign Fee Components')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <p class="text-primary">Assign fees to a class</p>
                        </div>
                    </div>
                    <div class="card-body px-6">
                        <h1 class="mb-4">Assign Fees to Class</h1>
                        <form action="{{ route('admin.assign.store') }}" method="POST">
                            @csrf

                            {{-- Year Selector --}}
                            <div class="mb-3 row">
                                <label for="year" class="col-sm-2 col-form-label">Academic Year</label>
                                <div class="col-sm-4">
                                    <select id="year" name="year" class="form-select">
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}" {{ old('year') == $year->id ? 'selected' : '' }}>
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Form/Grade Level Selector --}}
                            <div class="mb-3 row">
                                <label for="grade_level_id" class="col-sm-2 col-form-label">Form (Grade Level)</label>
                                <div class="col-sm-4">
                                    <select id="grade_level_id" name="grade_level_id" class="form-select">
                                        @foreach($forms as $form)
                                            <option value="{{ $form->id }}" {{ old('grade_level_id') == $form->id ? 'selected' : '' }}>{{ $form->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Fee Components Checkboxes --}}
                            <div class="mb-4">
                                <h5>Select Fee Components</h5>
                                <div class="row">
                                    @foreach($feeComponents as $component)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="component-{{ $component->id }}" name="components[]"
                                                    value="{{ $component->id }}" {{ in_array($component->id, old('components', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="component-{{ $component->id }}">
                                                    {{ $component->name }} - {{number_format($component->amount) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Assignments</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection