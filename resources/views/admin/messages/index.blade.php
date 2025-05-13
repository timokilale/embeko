@extends('layouts.admin')

@section('title', 'Feedback Messages')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Feedback Messages</h2>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Received</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ Str::limit($message->message, 50) }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td>{{ $message->read_at?'Read':'Unread' }}</td>
                                <td>
                                    <a href="{{ route('admin.messages.show', $message->id) }}">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                            View
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No feedback messages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $messages->links() }}
            </div>

@endsection