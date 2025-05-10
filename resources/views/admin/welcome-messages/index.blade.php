@extends('layouts.admin')

@section('title', 'Manage Welcome Messages')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Welcome Messages</h1>
        <a href="{{ route('admin.welcome-messages.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Add New Welcome Message
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Welcome Messages Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Homepage Welcome Messages</h6>
        </div>
        <div class="card-body">
            @if($welcomeMessages->isEmpty())
                <div class="alert alert-info mb-0">
                    <i class="fas fa-info-circle me-2"></i>No welcome messages found. Click the "Add New Welcome Message" button to create your first message.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th width="150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($welcomeMessages as $message)
                                <tr>
                                    <td>
                                        @if($message->image)
                                            <img src="{{ asset('storage/' . $message->image) }}" alt="{{ $message->title }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                <i class="fas fa-image text-secondary"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $message->title }}</td>
                                    <td>
                                        @if($message->author_name)
                                            {{ $message->author_name }}<br>
                                            <small class="text-muted">{{ $message->author_title }}</small>
                                        @else
                                            <span class="text-muted">Not specified</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($message->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                            <form action="{{ route('admin.welcome-messages.set-active', $message->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-success ms-2">
                                                    Set Active
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.welcome-messages.edit', $message->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.welcome-messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-confirm="Are you sure you want to delete this welcome message? This action cannot be undone.">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
