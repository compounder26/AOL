@extends('layout')

@section('title', 'Welcome to NOVERTY')

@section('content')
<div class="card mx-auto" style="max-width: 400px; border-radius: 15px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
    <div class="card-body">
        <h2 class="text-center mb-4" style="color: #914d27;">NOVERTY</h2>

        <!-- Display error messages if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display success message if available -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message for invalid credentials -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>
                Don’t have an account? <a href="{{ route('register') }}" class="text-success">Register here</a>
            </small>
        </div>
    </div>
</div>
@endsection
