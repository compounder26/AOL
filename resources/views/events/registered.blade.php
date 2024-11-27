@extends('layout')

@section('title', 'Registered Events')

@section('content')
<div class="container mt-5">
    <h1>Registered Events</h1>
    @forelse($events as $event)
        <div class="mb-4">
            <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none">
                <h4>{{ $event->name }}</h4>
            </a>
            <p>{{ Str::limit($event->notes, 150) }}</p>
            <small>Date: {{ $event->date }}</small>
        </div>
    @empty
        <p>You are not registered for any events.</p>
    @endforelse
</div>
@endsection
