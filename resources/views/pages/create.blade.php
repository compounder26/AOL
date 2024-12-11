@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'createEvents'])
@endsection

@section('content')
    <div class="container py-5" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h1 class="h3 mb-0">Create New Volunteer Event</h1>
                    </div>
                    <div class="card-body p-5">
                        <form action="/newEvent" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="title" placeholder="Event Name">
                                        <label>Event Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="category">
                                            <option disabled>Select Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Event Category</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="dateTime">
                                        <label>Event Date</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Event Location">
                                        <label>Event Location</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="organizer"
                                            placeholder="Event Organizer">
                                        <label>Event Organizer</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="orgEmail"
                                            placeholder="Organizer Email">
                                        <label>Organizer Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="description" placeholder="Event Description" style="height: 150px"></textarea>
                                        <label>Event Description</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Event Poster</label>
                                        <input class="form-control" type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Volunteers Needed</label>
                                        <input type="number" class="form-control" name="quota"
                                            placeholder="Number of Volunteers" min="1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="note"
                                            placeholder="Special Notes (Optional)">
                                        <label>Special Notes (Optional)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Create Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
