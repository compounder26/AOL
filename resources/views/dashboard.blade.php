@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>User Dashboard</h2>
                </div>
                <div class="card-body">
                    <h3>Profile Information</h3>
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    
                    <div class="mt-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h3>My Events</h3>
                </div>
                <div class="card-body">
                    <h4>Created Events</h4>
                    @forelse(auth()->user()->createdEvents as $event)
                        <div class="mb-2">
                            <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
                        </div>
                    @empty
                        <p>No events created yet.</p>
                    @endforelse

                    <h4 class="mt-4">Registered Events</h4>
                    @forelse(auth()->user()->events as $event)
                        <div class="mb-2">
                            <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
                        </div>
                    @empty
                        <p>Not registered for any events.</p>
                    @endforelse

                    <div class="mt-4">
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
