@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h3 class="mb-4 text-center">My Profile</h3>

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $user->name }}"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ $user->email }}"
                               required>
                    </div>

                    <hr>

                    <h5 class="mt-3">Change Password</h5>

                    <!-- Current Password -->
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password"
                               name="current_password"
                               class="form-control">
                    </div>

                    <!-- New Password -->
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"
                               name="new_password"
                               class="form-control">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password"
                               name="new_password_confirmation"
                               class="form-control">
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Update Profile
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection