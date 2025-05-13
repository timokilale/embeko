@extends('layouts.admin')

@section('title', 'School Fees')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Fee Registration</h2>

            <a href="{{ route('admin.fees.create') }}" class="btn btn-primary mb-3">
            Add New Fee
        </a>
        </div>
        

        @if($fees->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fee Name</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fees as $index => $fee)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fee->name }}</td>
                                <td>{{ number_format($fee->amount, 2) }}</td>
                                <td>{{ $fee->description }}</td>
                                <td>
                                    <a href="{{ route('admin.fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                No fees found.
            </div>
        @endif
@endsection