@extends('layout')

@section('title', 'My Events')

@section('content')
<div class="container mt-5">
    <h1>My Events</h1>
    <h3>Created Events</h3>
    @forelse($createdEvents as $event)
        <div class="mb-4">
            <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none">
                <h4>{{ $event->name }}</h4>
            </a>
            <p>{{ Str::limit($event->notes, 150) }}</p>
            <small>Date: {{ $event->date }}</small>
        </div>
    @empty
        <p>You have not created any events yet.</p>
    @endforelse
</div>
@endsection
