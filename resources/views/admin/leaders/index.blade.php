@extends('layouts.admin')

@section('title', 'Manage School Leadership')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage School Leadership</h1>
        <a href="{{ route('admin.leaders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Add New Leader
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Leaders Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">School Leadership Profiles</h6>
        </div>
        <div class="card-body">
            @if($leaders->isEmpty())
                <div class="alert alert-info mb-0">
                    <i class="fas fa-info-circle me-2"></i>No leadership profiles found. Click the "Add New Leader" button to create your first profile.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" id="leadersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="50px">#</th>
                                <th width="80px">Photo</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th width="150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="leaders-list">
                            @foreach($leaders as $leader)
                                <tr data-id="{{ $leader->id }}">
                                    <td>
                                        <span class="handle"><i class="fas fa-grip-vertical"></i></span>
                                    </td>
                                    <td>
                                        @if($leader->image)
                                            <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-secondary"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $leader->name }}</td>
                                    <td>{{ $leader->position }}</td>
                                    <td>
                                        @if($leader->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.leaders.edit', $leader->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.leaders.destroy', $leader->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-confirm="Are you sure you want to delete this leader profile? This action cannot be undone.">
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

@push('styles')
<style>
    .handle {
        cursor: move;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const leadersList = document.getElementById('leaders-list');
        
        if (leadersList) {
            new Sortable(leadersList, {
                handle: '.handle',
                animation: 150,
                onEnd: function() {
                    updateLeadersOrder();
                }
            });
        }
        
        function updateLeadersOrder() {
            const rows = document.querySelectorAll('#leaders-list tr');
            const leaders = [];
            
            rows.forEach(row => {
                leaders.push(row.dataset.id);
            });
            
            fetch('{{ route('admin.leaders.update-order') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ leaders: leaders })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Leaders order updated successfully');
                }
            })
            .catch(error => {
                console.error('Error updating leaders order:', error);
            });
        }
    });
</script>
@endpush
