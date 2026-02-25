@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>Create Account</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter your name"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Enter your email"
                               required>    
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter password"
                               required>
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Register
                        </button>
                    </div>

                </form>

                <hr>

                <div class="text-center">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection