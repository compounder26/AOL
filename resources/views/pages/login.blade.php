@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'login'])
@endsection

@section('content')
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Music&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Yaldevi:wght@200..700&display=swap" rel="stylesheet">
</head>
    <body style="font-family:'Titillium Web'">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; min-width:100vw; position:relative; z-index:10">
            <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100vw; height: 100vh; background-image: url('images/login.jpg'); background-size:cover; background-position:center; filter: brightness(50%); z-index: -10;"></div>
            <div style="position: fixed; top: 8%; z-index: 1; color: white; font-size: 4rem; font-weight: bold; font-family:'Yaldevi'">
                NOVERTY
            </div>
            <div style="position: fixed; top: 20%; z-index: 1; color: white; font-size: 1rem">
                Good to see you! Let's make the world a better place!
            </div>
            <div class="card shadow p-3" style="width: 100%; max-width: 400px; border-radius:20px; z-index:0;margin-top:35px">
                <h3 class="card-title text-center mb-2" style="font-size: 2rem">LOGIN</h3>
                <h5 class="card-title text-center mb-4" style="font-size:0.9rem">Log into your account</h5>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required autocomplete="password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm w-100">Login</button>
                    <p class="text-center mt-3">
                        Don't have an account? <a href="/register">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
@endsection
