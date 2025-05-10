@extends('layouts.admin')

@section('title', 'Manage Downloads')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Downloads</h1>
        <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Add New Download
        </a>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.downloads.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Search by title or description">
                </div>
                <div class="col-md-3">
                    <label for="category_type" class="form-label">Category</label>
                    <select class="form-select" id="category_type" name="category_type">
                        <option value="">All Categories</option>
                        @foreach($categoryTypes as $type)
                            <option value="{{ $type }}" {{ request('category_type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="file_type" class="form-label">File Type</label>
                    <select class="form-select" id="file_type" name="file_type">
                        <option value="">All File Types</option>
                        @foreach($fileTypes as $type)
                            <option value="{{ $type }}" {{ request('file_type') == $type ? 'selected' : '' }}>
                                {{ strtoupper($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Downloads Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Downloads</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="downloadsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>File Type</th>
                            <th>File Size</th>
                            <th>Downloads</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($downloads as $download)
                            <tr>
                                <td>{{ $download->title }}</td>
                                <td>{{ ucfirst($download->category_type ?? 'Uncategorized') }}</td>
                                <td>{{ strtoupper($download->file_type ?? 'Unknown') }}</td>
                                <td>{{ $download->file_size ? round($download->file_size / 1024, 2) . ' KB' : 'Unknown' }}</td>
                                <td>{{ $download->download_count }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('downloads.download', $download->id) }}" class="btn btn-sm btn-success" target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-confirm="Are you sure you want to delete this download? This action cannot be undone.">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No downloads found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $downloads->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
