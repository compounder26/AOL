@extends('layout')

@section('title', $event->name)

@section('content')
<div class="container mt-4">
    <!-- Back Button -->
    <a href="{{ session('referrer_url', route('events.index')) }}" class="btn btn-outline-primary mb-3">Back</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header text-white" style="background-color: #4CAF50; border-radius: 10px 10px 0 0;">
            <h3 class="text-center">{{ $event->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $event->photo) }}" alt="Event Photo" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h5>Description</h5>
                    <p>{{ $event->notes }}</p>
                    <hr>
                    <p><strong>Location:</strong> {{ $event->location }}</p>
                    <p><strong>Date and Time:</strong> {{ $event->start_time->format('d M Y, H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                    <p><strong>Organizer:</strong> {{ $event->organizer }}</p>
                    <p><strong>Slots Available:</strong> {{ $event->slots }}</p>

                    @if($event->end_time < now())
                        <!-- Show a message for past events -->
                        <div class="alert alert-secondary mt-3">
                            This event has concluded.
                        </div>
                    @elseif(Auth::user()->events->contains($event->id))
                        <!-- Show a message if the user is already registered -->
                        <div class="alert alert-info mt-3">
                            You are already registered for this event.
                        </div>
                    @elseif($event->slots > 0)
                        <!-- Show the modal trigger button -->
                        <button class="btn btn-success w-100" data-toggle="modal" data-target="#registerModal">Register</button>
                    @else
                        <!-- Show a message if the event is full -->
                        <div class="alert alert-danger mt-3">
                            This event is full.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d4e9d4;">
                <h5 class="modal-title" id="registerModalLabel">Confirm Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you willing to commit to this volunteer event and follow the program until its completion?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('events.register', $event->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
