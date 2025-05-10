<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Embeko Secondary School</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Minimalist Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/minimalist.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
        }
        .card {
            border-radius: 0 !important;
            box-shadow: none !important;
            border: 1px solid #000 !important;
            overflow: hidden;
        }
        .card-header {
            background-color: #ffffff !important;
            color: #000000 !important;
            text-align: center;
            padding: 1.5rem;
            border-bottom: 1px solid #000 !important;
        }
        .logo {
            max-width: 80px;
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 1px solid #000000 !important;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0 !important;
        }
        .btn-primary:hover {
            background-color: #000000 !important;
            color: #ffffff !important;
        }
        .form-control {
            padding: 0.75rem;
            border-radius: 0 !important;
            border: 1px solid #000000 !important;
        }
        .input-group-text {
            border-radius: 0 !important;
            background-color: #ffffff !important;
            border: 1px solid #000000 !important;
        }
        .form-check-label {
            color: #000000;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #000000;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline !important;
        }
        .alert {
            border-radius: 0 !important;
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 1px solid #000000 !important;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <img src="{{ asset('images/logo.png') }}" alt="Embeko Logo" class="logo">
                <h4 class="mb-0">Embeko Secondary School</h4>
                <p class="mb-0">Admin Login</p>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </button>
                </form>
            </div>
        </div>
        <a href="{{ route('home') }}" class="back-link">
            <i class="fas fa-arrow-left me-1"></i> Back to Website
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
