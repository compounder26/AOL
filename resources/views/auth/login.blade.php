@extends('layoutGuest')

@section('title', 'Welcome to NOVERTY')

@section('content')
<div style="background-image: url('{{ asset('images/background.webp') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card text-center" style="max-width: 400px; background: rgba(255, 255, 255, 0.9); border-radius: 15px; padding: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        <h2 style="color: #3b3a30; margin-bottom: 10px;">NOVERTY</h2>
        <p style="color: #3b3a30; margin-bottom: 20px;">Good to see you! Let’s make the world a better place!</p>

        <!-- Display error messages if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="text-align: left;">
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
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" style="border-radius: 5px; margin-bottom: 15px;" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" style="border-radius: 5px; margin-bottom: 15px;" required>
            </div>
            <button type="submit" class="btn btn-success btn-block" style="background-color: #3b3a30; border: none; border-radius: 5px; padding: 10px;">LOGIN</button>
        </form>

        <div class="text-center mt-3">
            <small style="color: #3b3a30;">
                Don’t have an account? <a href="{{ route('register') }}" style="color: #3b3a30; font-weight: bold;">Register</a>
            </small>
        </div>
    </div>
</div>
@endsection
