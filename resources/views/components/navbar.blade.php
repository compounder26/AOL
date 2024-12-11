@php
    use Illuminate\Support\Facades\Auth;
@endphp
@if (Auth::check())
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">{{ env('APP_NAME') }}</a>
            @auth
                <a href="#" class="navbar-brand username">Hello, {{ Auth::user()->name }}</a>
            @endauth
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ env('APP_NAME') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'home' ? 'active' : '' }}" aria-current="page"
                                href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'events' ? 'active' : '' }}" aria-current="page"
                                href="/allEvents">All Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'about' ? 'active' : '' }}" aria-current="page"
                                href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'registered' ? 'active' : '' }}" aria-current="page"
                                href="/registered">Registered Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'myEvent' ? 'active' : '' }}" aria-current="page"
                                href="/myEvent">My Event</a>
                        </li>
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'about' ? 'active' : '' }}" aria-current="page"
                            href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'login' ? 'active' : '' }}" aria-current="page"
                            href="/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'register' ? 'active' : '' }}" aria-current="page"
                            href="/register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif
