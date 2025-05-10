<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embeko Secondary School</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero {
            background-color: #0d6efd;
            color: white;
            padding: 3rem 0;
        }
        .logo {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="hero text-center">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" alt="Embeko Secondary School Logo" class="logo mb-3">
            <h1>EMBEKO SECONDARY SCHOOL</h1>
            <p class="lead">Education with excellency</p>
        </div>
    </div>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Welcome to Embeko Secondary School</h2>
                <p class="mb-4">
                    Embeko Secondary School is a premier educational institution committed to providing quality education with excellence. 
                    We strive to nurture our students to become responsible citizens and future leaders through a holistic approach to education.
                </p>
                <p class="mb-4">
                    Our website is currently being updated. Please check back soon for more information.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="mailto:info@embeko.ac.tz" class="btn btn-primary">
                        <i class="fas fa-envelope me-2"></i> Contact Us
                    </a>
                    <a href="tel:+255123456789" class="btn btn-outline-primary">
                        <i class="fas fa-phone me-2"></i> Call Us
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>
                <i class="fas fa-map-marker-alt me-2"></i> P.O. Box 1234, Dodoma, Tanzania<br>
                <i class="fas fa-phone me-2"></i> +255 123 456 789<br>
                <i class="fas fa-envelope me-2"></i> info@embeko.ac.tz
            </p>
            <p>&copy; {{ date('Y') }} Embeko Secondary School. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
