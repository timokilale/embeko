@extends('layouts.admin')

@section('title', 'View Feedback Message')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0 text-black">Feedback Message Details</h4>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $message->name }}</dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $message->email }}</dd>

                        <dt class="col-sm-3">Subject</dt>
                        <dd class="col-sm-9">{{ $message->subject }}</dd>

                        <dt class="col-sm-3">Message</dt>
                        <dd class="col-sm-9">
                            <div class="border rounded p-2 bg-light">{{ $message->message }}</div>
                        </dd>

                        <dt class="col-sm-3">Received</dt>
                        <dd class="col-sm-9">{{ $message->created_at->format('Y-m-d H:i') }} ({{ $message->created_at->diffForHumans() }})</dd>
                    </dl>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to Messages
                        </a>
                    </div>
                </div>
                @endsection