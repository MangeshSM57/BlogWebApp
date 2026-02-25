@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow">
            <div class="card-header text-white text-center" style="background-color:#6f42c1;">
                <h4>Login</h4>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                               placeholder="Enter your password" 
                               required>
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>

                </form>

                <hr>

                <div class="text-center">
                    Don't have an account? 
                    <a href="{{ route('register') }}">Create account</a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection