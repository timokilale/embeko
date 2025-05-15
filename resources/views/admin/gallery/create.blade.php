@extends('layouts.admin')

@section('title', 'Upload Gallery Images')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Upload Images to Gallery</h2>
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="images" class="form-label">Choose Images</label>
                <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple required>
                <small class="text-muted">You can upload multiple images.</small>
            </div>

            <div id="preview" class="row g-3 mb-4"></div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('images').addEventListener('change', function () {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';

            Array.from(this.files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function (e) {
                    const col = document.createElement('div');
                    col.className = 'col-4 col-md-2';
                    col.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded shadow-sm">`;
                    preview.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
