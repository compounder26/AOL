@extends('layout')

@section('title', 'Events')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-success">Suggested Volunteering Activities</h1>
        <a href="{{ route('events.create') }}" class="btn btn-outline-success">Create Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('events.index') }}" class="row g-3 my-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search events by name">
        </div>
        <div class="col-md-3">
            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" placeholder="Start Date">
            <small class="form-text text-muted">Filter events starting on or after this date.</small>
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" placeholder="End Date">
            <small class="form-text text-muted">Filter events ending on or before this date.</small>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Filter</button>
        </div>
    </form>
    

    <!-- Toggle Buttons -->
    <div class="d-flex justify-content-center my-4">
        <a href="{{ route('events.index', ['filter' => 'ongoing']) }}" 
           class="btn {{ request('filter') !== 'past' ? 'btn-success' : 'btn-outline-success' }} me-2">
            Ongoing Events
        </a>
        <a href="{{ route('events.index', ['filter' => 'past']) }}" 
           class="btn {{ request('filter') === 'past' ? 'btn-success' : 'btn-outline-success' }}">
            Past Events
        </a>
    </div>

    <!-- Event Cards -->
    <div class="row mt-4">
        @forelse($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="border-radius: 10px;">
                    <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" class="card-img-top" style="max-height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ Str::limit($event->notes, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Date: {{ $event->start_time->format('d F Y') }}</small></p>
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
