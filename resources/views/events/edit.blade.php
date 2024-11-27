@extends('layout')

@section('title', 'Edit Event')

@section('content')
<div class="container mt-5">
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}" required>
        </div>
        <div class="form-group">
            <label for="photo">Event Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            <img src="{{ asset('storage/' . $event->photo) }}" alt="Current Photo" class="img-fluid mt-2" style="max-height: 150px;">
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="organizer">Organizer</label>
            <input type="text" name="organizer" id="organizer" class="form-control" value="{{ $event->organizer }}" required>
        </div>
        <div class="form-group">
            <label for="notes">Description</label>
            <textarea name="notes" id="notes" rows="5" class="form-control" required>{{ $event->notes }}</textarea>
        </div>
        <div class="form-group">
            <label for="slots">Slots Available</label>
            <input type="number" name="slots" id="slots" class="form-control" value="{{ $event->slots }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
@endsection
