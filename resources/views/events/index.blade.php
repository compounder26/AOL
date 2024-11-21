@extends('layout')

@section('title', 'Events')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-success">Suggested Volunteering Activities</h1>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">My Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-4">
        @forelse($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="border-radius: 10px;">
                    <div class="card-header" style="background-color: {{ $loop->iteration % 2 === 0 ? '#FFD700' : '#87CEFA' }}; height: 100px;"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ Str::limit($event->notes, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Date: {{ $event->date }}</small></p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No events available at the moment.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
