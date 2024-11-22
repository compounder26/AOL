@extends('layout')

@section('title', 'Create Event')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-success">Create a New Event</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Event Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/png, image/jpeg" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
        </div>

        <div class="mb-3">
            <label for="organizer" class="form-label">Organizer</label>
            <input type="text" name="organizer" id="organizer" class="form-control" value="{{ old('organizer') }}" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" id="notes" class="form-control" rows="4" required>{{ old('notes') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="slots" class="form-label">Available Slots</label>
            <input type="number" name="slots" id="slots" class="form-control" value="{{ old('slots') }}" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Create Event</button>
    </form>
</div>
@endsection
