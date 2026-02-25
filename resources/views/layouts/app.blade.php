<!DOCTYPE html>
<html>
<head>
    <title>Blog App</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('posts.index') }}">MG Blog</a>

        <!-- Toggle button (for mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Left Side Links -->
            <ul class="navbar-nav me-auto">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">My Details</a>
                </li>


                @endauth

            </ul>

            <!-- Right Side Auth Buttons -->
            <ul class="navbar-nav">

                @guest
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white me-2 px-3" href="{{ route('login') }}">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-success text-white px-3" href="{{ route('register') }}">Register</a>
                </li>
                @endguest

                @auth
                <li class="nav-item d-flex align-items-center text-white me-3">
                    Welcome, {{ auth()->user()->name }}
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
                </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>

<div class="container mt-4 grow">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<!-- Footer -->
<footer class="bg-dark text-white mt-5 pt-4 pb-3">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-md-4 mb-3">
                <h5>MG Blog</h5>
                <p class="small">
                    A simple Laravel blog project built with Bootstrap.
                    Sharing knowledge and creativity.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('posts.index') }}" class="text-white text-decoration-none">Posts</a></li>
                    <li><a href="{{ route('about') }}" class="text-white text-decoration-none">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4 mb-3">
                <h5>Contact</h5>
                <p class="small mb-1">Email: support@myblog.com</p>
                <p class="small">© {{ date('Y') }} MG Blog. All rights reserved.</p>
            </div>

        </div>
    </div>
</footer>

</body>
</html>