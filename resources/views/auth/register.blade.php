@extends('layoutGuest')

@section('title', 'Register - NOVERTY')

@section('content')
<div style="background-image: url('{{ asset('images/background.webp') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card text-center" style="max-width: 400px; background: rgba(255, 255, 255, 0.9); border-radius: 15px; padding: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        <h2 style="color: #3b3a30; margin-bottom: 10px;">NOVERTY</h2>
        <p style="color: #3b3a30; margin-bottom: 20px;">Join us and make the world a better place!</p>

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus style="border-radius: 5px; margin-bottom: 15px;">
            </div>

            <!-- Email -->
            <div class="form-group">
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required style="border-radius: 5px; margin-bottom: 15px;">
            </div>

            <!-- Password -->
            <div class="form-group">
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required style="border-radius: 5px; margin-bottom: 15px;">
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required style="border-radius: 5px; margin-bottom: 15px;">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success btn-block" style="background-color: #3b3a30; border: none; border-radius: 5px; padding: 10px;">REGISTER</button>
        </form>

        <div class="text-center mt-3">
            <small style="color: #3b3a30;">
                Already registered? <a href="{{ route('login') }}" style="color: #3b3a30; font-weight: bold;">Login</a>
            </small>
        </div>
    </div>
</div>
@endsection
