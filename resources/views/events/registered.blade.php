@extends('layout')

@section('title', 'Registered Events')

@section('content')
<div class="container mt-5">
    <h1>Registered Events</h1>
    @forelse($events as $event)
        <div class="row mb-4 border-bottom pb-3">
            <!-- Event Image -->
            <div class="col-md-2">
                <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" class="img-fluid rounded">
            </div>
            <!-- Event Details -->
            <div class="col-md-8">
                <h4>{{ $event->name }}</h4>
                <p>{{ Str::limit($event->notes, 150) }}</p>
                <small>Date: {{ $event->start_time ? $event->start_time->format('d M Y') : 'TBD' }}</small>
            </div>
            <!-- Detail Button -->
            <div class="col-md-2 text-right">
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-eye"></i> Detail
                </a>
            </div>
        </div>
    @empty
        <p>You are not registered for any events.</p>
    @endforelse
</div>
@endsection
