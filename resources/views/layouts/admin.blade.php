<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Embeko Secondary School</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/sass/app.scss','resources/js/app.js'])

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            @include('admin.components.topnav')

            <!-- Main Content -->
            <div class="container-fluid p-4">
                @include('admin.components.alerts')

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    @include('components.confirmation-modal')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <!-- CKEditor Helper Script -->
    <script>
        // Global helper function for CKEditor form submission
        document.addEventListener('DOMContentLoaded', function() {
            // Find all forms with CKEditor instances
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Get all CKEditor instances
                    if (window.CKEDITOR) {
                        for (const name in CKEDITOR.instances) {
                            const editor = CKEDITOR.instances[name];
                            const element = editor.element.$;
                            if (element) {
                                element.value = editor.getData();
                            }
                        }
                    }

                    // Also handle any specific editor instances we've stored
                    const editorInstances = [
                        'editor', 'descriptionEditor', 'resultsDataEditor', 'welcomeEditor', 'contentEditor', 'editContentEditor'
                    ];

                    editorInstances.forEach(instanceName => {
                        if (window[instanceName]) {
                            try {
                                const targetId = window[instanceName].sourceElement.getAttribute('id');
                                const targetElement = document.getElementById(targetId);
                                if (targetElement) {
                                    targetElement.value = window[instanceName].getData();
                                }
                            } catch (error) {
                                console.warn('Error handling editor instance:', error);
                            }
                        }
                    });
                });
            });
        });
    </script>

    <!-- Custom JS -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <!-- Confirmation Dialog JS -->
    <script src="{{ asset('js/confirmation.js') }}"></script>

    @stack('scripts')
</body>
</html>
