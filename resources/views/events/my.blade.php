@extends('layout')

@section('title', 'My Events')

@section('content')
<div class="container mt-5">
    <h1>My Events</h1>
    <h3>Created Events</h3>
    @forelse($createdEvents as $event)
        <div class="row mb-4 border-bottom pb-3">
            <div class="col-md-2">
                <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h4>{{ $event->name }}</h4>
                <p>{{ Str::limit($event->notes, 150) }}</p>
                <small>Date: {{ $event->start_time->format('d M Y') }}</small>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-primary">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                <a href="#" class="btn btn-outline-secondary" data-toggle="modal" data-target="#registeredUsersModal{{ $event->id }}">View Registrants</a>
            </div>
        </div>

        <!-- Registered Users Modal -->
        <div class="modal fade" id="registeredUsersModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="registeredUsersModalLabel{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registeredUsersModalLabel{{ $event->id }}">Registered Users for {{ $event->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($event->users->isEmpty())
                            <p>No users have registered for this event.</p>
                        @else
                            <ul>
                                @foreach($event->users as $user)
                                    <li>{{ $user->name }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>You have not created any events yet.</p>
    @endforelse
</div>
@endsection
