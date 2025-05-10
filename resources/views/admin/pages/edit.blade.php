@extends('layouts.admin')

@section('title', 'Edit Page - ' . $page->title)

@push('styles')
<style>
    .section-card {
        margin-bottom: 1.5rem;
    }
    .section-handle {
        cursor: move;
    }
    .section-content {
        max-height: 300px;
        overflow-y: auto;
    }
    .content-preview {
        position: relative;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
    .content-preview::before {
        content: 'Content Preview';
        position: absolute;
        top: -10px;
        left: 10px;
        background-color: #fff;
        padding: 0 5px;
        font-size: 12px;
        color: #6c757d;
    }
    .content-preview img {
        max-width: 100%;
        height: auto;
    }
    .content-preview table {
        width: 100%;
        border-collapse: collapse;
    }
    .content-preview table, .content-preview th, .content-preview td {
        border: 1px solid #dee2e6;
        padding: 8px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Page: {{ $page->title }}</h1>
        <div>
            <a href="{{ route('page.show', $page->slug) }}" target="_blank" class="btn btn-outline-info me-2">
                <i class="fas fa-eye me-2"></i>View Page
            </a>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Pages
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Page Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Page Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $page->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="layout" value="{{ $page->layout }}">

                        <div class="mb-3">
                            <label for="description" class="form-label">Page Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $page->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $page->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish this page</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Page URL</label>
                            <div class="input-group">
                                <span class="input-group-text">{{ url('/') }}/</span>
                                <input type="text" class="form-control" value="{{ $page->slug }}" disabled>
                            </div>
                        </div>

                        <input type="hidden" name="meta_title" value="{{ $page->meta_title ?? $page->title }}">
                        <input type="hidden" name="meta_description" value="{{ $page->meta_description ?? $page->description }}">
                        <input type="hidden" name="meta_keywords" value="{{ $page->meta_keywords }}">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Page
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Page Content Sections</h5>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                        <i class="fas fa-plus-circle me-2"></i>Add New Content Section
                    </button>
                </div>
                <div class="card-body">
                    @if($page->layout == 'about')
                        <div class="alert alert-info mb-4">
                            <h5><i class="fas fa-lightbulb me-2"></i>Adding School Leadership Profiles</h5>
                            <p>To add leadership profiles with photos:</p>
                            <ol>
                                <li>Create a new section titled "School Leadership" or edit the existing one</li>
                                <li>In the content editor, click the "Upload Image" button <i class="fas fa-image"></i> to add profile photos</li>
                                <li>Arrange the profiles in a grid layout using the formatting options</li>
                                <li>For each profile, add the person's name, title, and description</li>
                            </ol>
                            <p class="mb-0"><strong>Tip:</strong> For best results, use square images (e.g., 300x300 pixels) for profile photos.</p>
                        </div>
                    @endif

                    @if($page->sections->isEmpty())
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>This page has no content sections yet. Click the "Add New Content Section" button to create your first section.
                        </div>
                    @else
                        <div id="sections-container">
                            @foreach($page->sections as $section)
                                <div class="card section-card" data-section-id="{{ $section->id }}">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="section-handle me-2"><i class="fas fa-grip-vertical"></i></span>
                                            <strong>{{ $section->title }}</strong>
                                            <input type="hidden" value="{{ $section->identifier }}">
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary edit-section-btn"
                                                data-section-id="{{ $section->id }}"
                                                data-section-title="{{ $section->title }}"
                                                data-section-identifier="{{ $section->identifier }}"
                                                data-section-type="{{ $section->type }}"
                                                data-section-content="{{ $section->content }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.pages.sections.delete', [$page->id, $section->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" data-confirm="Are you sure you want to delete this content section? This will permanently remove all the content in this section.">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="section-content">
                                            <div class="content-preview">
                                                {!! $section->content !!}
                                            </div>
                                            <div class="mt-2 text-end">
                                                <small class="text-muted">Click the edit button to modify this content</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.pages.sections.add', $page->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionModalLabel">Add New Content Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Section Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        <input type="hidden" id="identifier" name="identifier" value="">
                    </div>

                    <input type="hidden" id="type" name="type" value="html">

                    <div class="mb-3">
                        <label for="content" class="form-label">Section Content</label>
                        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                        <small class="form-text text-muted">Use the toolbar above to format your content, add links, lists, tables, etc.</small>
                    </div>

                    <div class="mb-3">
                        <div class="accordion" id="templateAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="leadershipTemplateHeading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leadershipTemplateCollapse" aria-expanded="false" aria-controls="leadershipTemplateCollapse">
                                        <i class="fas fa-user-tie me-2"></i> Insert Leadership Profile Template
                                    </button>
                                </h2>
                                <div id="leadershipTemplateCollapse" class="accordion-collapse collapse" aria-labelledby="leadershipTemplateHeading" data-bs-parent="#templateAccordion">
                                    <div class="accordion-body">
                                        <p>Click the button below to insert a template for leadership profiles:</p>
                                        <button type="button" class="btn btn-outline-primary" id="insertLeadershipTemplate">
                                            <i class="fas fa-plus-circle me-2"></i>Insert Template
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Section Modal -->
<div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editSectionForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectionModalLabel">Edit Content Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Section Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                        <input type="hidden" id="edit_identifier" name="identifier">
                    </div>

                    <input type="hidden" id="edit_type" name="type" value="html">

                    <div class="mb-3">
                        <label for="edit_content" class="form-label">Section Content</label>
                        <textarea class="form-control" id="edit_content" name="content" rows="10"></textarea>
                        <small class="form-text text-muted">Use the toolbar above to format your content, add links, lists, tables, etc.</small>
                    </div>

                    <div class="mb-3">
                        <div class="accordion" id="editTemplateAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="editLeadershipTemplateHeading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#editLeadershipTemplateCollapse" aria-expanded="false" aria-controls="editLeadershipTemplateCollapse">
                                        <i class="fas fa-user-tie me-2"></i> Insert Leadership Profile Template
                                    </button>
                                </h2>
                                <div id="editLeadershipTemplateCollapse" class="accordion-collapse collapse" aria-labelledby="editLeadershipTemplateHeading" data-bs-parent="#editTemplateAccordion">
                                    <div class="accordion-body">
                                        <p>Click the button below to insert a template for leadership profiles:</p>
                                        <button type="button" class="btn btn-outline-primary" id="editInsertLeadershipTemplate">
                                            <i class="fas fa-plus-circle me-2"></i>Insert Template
                                        </button>
                                        <p class="text-danger mt-2"><small><strong>Warning:</strong> This will replace any existing content in the editor.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Section</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor for content fields with more options
        let contentEditor, editContentEditor;

        if (document.getElementById('content')) {
            ClassicEditor
                .create(document.getElementById('content'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', 'uploadImage', 'mediaEmbed', '|',
                        'undo', 'redo'
                    ],
                    image: {
                        toolbar: [
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            '|',
                            'toggleImageCaption',
                            'imageTextAlternative'
                        ]
                    },
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: '{{ route('admin.image.upload') }}',

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                })
                .then(editor => {
                    contentEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        }

        if (document.getElementById('edit_content')) {
            ClassicEditor
                .create(document.getElementById('edit_content'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', 'uploadImage', 'mediaEmbed', '|',
                        'undo', 'redo'
                    ],
                    image: {
                        toolbar: [
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            '|',
                            'toggleImageCaption',
                            'imageTextAlternative'
                        ]
                    },
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: '{{ route('admin.image.upload') }}',

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                })
                .then(editor => {
                    editContentEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        }

        // Make sure CKEditor content is saved before form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                if (contentEditor && form.querySelector('#content')) {
                    document.getElementById('content').value = contentEditor.getData();
                }
                if (editContentEditor && form.querySelector('#edit_content')) {
                    document.getElementById('edit_content').value = editContentEditor.getData();
                }
            });
        });

        // Leadership template HTML
        const leadershipTemplateHTML = `
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="text-center pt-3">
                <!-- Replace with actual image after uploading -->
                <img src="https://via.placeholder.com/150" alt="Profile Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-subtitle mb-2 text-muted">Principal</p>
                <p class="card-text">Brief description about the principal, their qualifications, experience, and vision for the school.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="text-center pt-3">
                <!-- Replace with actual image after uploading -->
                <img src="https://via.placeholder.com/150" alt="Profile Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">Jane Smith</h5>
                <p class="card-subtitle mb-2 text-muted">Vice Principal</p>
                <p class="card-text">Brief description about the vice principal, their qualifications, experience, and responsibilities.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="text-center pt-3">
                <!-- Replace with actual image after uploading -->
                <img src="https://via.placeholder.com/150" alt="Profile Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">Robert Johnson</h5>
                <p class="card-subtitle mb-2 text-muted">Head of Academics</p>
                <p class="card-text">Brief description about the head of academics, their qualifications, experience, and academic vision.</p>
            </div>
        </div>
    </div>
</div>

<p class="text-muted"><small>Click on each placeholder image and use the upload button to replace with actual profile photos.</small></p>
`;

        // Handle leadership template insertion for Add Section
        const insertLeadershipTemplateBtn = document.getElementById('insertLeadershipTemplate');
        if (insertLeadershipTemplateBtn) {
            insertLeadershipTemplateBtn.addEventListener('click', function() {
                // Set the template in the editor
                if (contentEditor) {
                    contentEditor.setData(leadershipTemplateHTML);
                }

                // Set the title if it's empty
                const titleInput = document.getElementById('title');
                if (titleInput && !titleInput.value) {
                    titleInput.value = 'School Leadership';
                }

                // Close the accordion
                const leadershipTemplateCollapse = document.getElementById('leadershipTemplateCollapse');
                const bsCollapse = new bootstrap.Collapse(leadershipTemplateCollapse);
                bsCollapse.hide();
            });
        }

        // Handle leadership template insertion for Edit Section
        const editInsertLeadershipTemplateBtn = document.getElementById('editInsertLeadershipTemplate');
        if (editInsertLeadershipTemplateBtn) {
            editInsertLeadershipTemplateBtn.addEventListener('click', function() {
                // Set the template in the editor
                if (editContentEditor) {
                    editContentEditor.setData(leadershipTemplateHTML);
                }

                // Set the title if it's "School Leadership"
                const editTitleInput = document.getElementById('edit_title');
                if (editTitleInput && !editTitleInput.value) {
                    editTitleInput.value = 'School Leadership';
                }

                // Close the accordion
                const editLeadershipTemplateCollapse = document.getElementById('editLeadershipTemplateCollapse');
                const bsEditCollapse = new bootstrap.Collapse(editLeadershipTemplateCollapse);
                bsEditCollapse.hide();
            });
        }

        // Initialize Sortable for sections
        const sectionsContainer = document.getElementById('sections-container');
        if (sectionsContainer) {
            new Sortable(sectionsContainer, {
                handle: '.section-handle',
                animation: 150,
                onEnd: function() {
                    // Get the new order of sections
                    const sectionIds = Array.from(sectionsContainer.querySelectorAll('.section-card'))
                        .map(card => card.dataset.sectionId);

                    // Send the new order to the server
                    fetch('{{ route('admin.pages.sections.reorder', $page->id) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ sections: sectionIds })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Sections reordered successfully');
                        }
                    })
                    .catch(error => {
                        console.error('Error reordering sections:', error);
                    });
                }
            });
        }

        // Handle edit section button clicks
        const editSectionBtns = document.querySelectorAll('.edit-section-btn');
        editSectionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const sectionId = this.dataset.sectionId;
                const sectionTitle = this.dataset.sectionTitle;
                const sectionIdentifier = this.dataset.sectionIdentifier;
                const sectionContent = this.dataset.sectionContent;

                // Set form action
                document.getElementById('editSectionForm').action =
                    '{{ route('admin.pages.sections.update', [$page->id, '']) }}/' + sectionId;

                // Set form values
                document.getElementById('edit_title').value = sectionTitle;
                document.getElementById('edit_identifier').value = sectionIdentifier;

                // We need to destroy and recreate the editor to properly set the content
                if (editContentEditor) {
                    editContentEditor.destroy()
                        .then(() => {
                            // Set the raw content first
                            document.getElementById('edit_content').value = sectionContent;

                            // Recreate the editor with the same configuration
                            ClassicEditor
                                .create(document.getElementById('edit_content'), {
                                    toolbar: [
                                        'heading', '|',
                                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                                        'outdent', 'indent', '|',
                                        'blockQuote', 'insertTable', 'uploadImage', 'mediaEmbed', '|',
                                        'undo', 'redo'
                                    ],
                                    image: {
                                        toolbar: [
                                            'imageStyle:inline',
                                            'imageStyle:block',
                                            'imageStyle:side',
                                            '|',
                                            'toggleImageCaption',
                                            'imageTextAlternative'
                                        ]
                                    },
                                    simpleUpload: {
                                        // The URL that the images are uploaded to.
                                        uploadUrl: '{{ route('admin.image.upload') }}',

                                        // Headers sent along with the XMLHttpRequest to the upload server.
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    }
                                })
                                .then(editor => {
                                    editContentEditor = editor;

                                    // Show the modal after the editor is ready
                                    const editSectionModal = new bootstrap.Modal(document.getElementById('editSectionModal'));
                                    editSectionModal.show();
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        });
                } else {
                    // If there's no editor yet, just set the content and show the modal
                    document.getElementById('edit_content').value = sectionContent;

                    // Show the modal
                    const editSectionModal = new bootstrap.Modal(document.getElementById('editSectionModal'));
                    editSectionModal.show();
                }
            });
        });
    });
</script>
@endpush
