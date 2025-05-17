@extends('layouts.admin')

@section('title', 'School Fees')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Fee Registration</h2>
        </div>

        <form action="{{ route('admin.fees.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Fee Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Register Fee</button>
        </form>
@endsection