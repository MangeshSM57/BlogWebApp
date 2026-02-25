@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">About Our Blog</h1>
        <p class="text-muted">A place where ideas meet creativity ✍️</p>
        <hr class="w-25 mx-auto">
    </div>

    <!-- Main About Card -->
    <div class="card shadow-lg border-0 p-5 mb-5">
        <div class="row align-items-center">

            <!-- Left Content -->
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">Welcome to Our Blogging Platform</h3>

                <p>
                    This is a modern Blog Application developed by <strong>Mangesh</strong>. 
                    Here, users can create, read, and manage blog posts easily.
                </p>

                <p>
                    Our platform allows writers to share their thoughts, ideas, knowledge,
                    and experiences with the world in a simple and user-friendly way.
                </p>

                <p>
                    Whether it's technology, lifestyle, education, or personal experiences —
                    this blog is built to publish content smoothly and securely.
                </p>

                <a href="/posts" class="btn btn-dark mt-3">
                    Explore Blogs
                </a>
            </div>

            <!-- Right Image -->
            <div class="col-md-6 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                     class="img-fluid"
                     style="max-height:280px;">
            </div>

        </div>
    </div>

    <!-- Features Section -->
    <div class="row text-center">

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-4 border-0 h-100">
                <h4>📝 Easy Post Creation</h4>
                <p>Create and manage blog posts with a simple and clean interface.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-4 border-0 h-100">
                <h4>🔐 Secure Authentication</h4>
                <p>User registration and login system with protected access.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-4 border-0 h-100">
                <h4>📚 Organized Content</h4>
                <p>Structured layout to read blogs smoothly and comfortably.</p>
            </div>
        </div>

    </div>

</div>

@endsection