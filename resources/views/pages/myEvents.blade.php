@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'myEvent'])
@endsection

@section('content')
    <div class="container-fluid bg-light py-5">
        <div class="card border-success mt-4">
            <div class="card-header bg-success text-white text-center">
                <h2 class="mb-0">Manage Volunteers</h2>
            </div>
            <div class="card-body">
                @forelse ($events as $event)
                    <div class="row align-items-center border-bottom py-4 hover-highlight">
                        <div class="col-3 text-center">
                            <img src="{{ asset($event->image) }}" class="img-fluid rounded"
                                style="max-height: 400px; object-fit: cover;">
                        </div>
                        <div class="col-3">
                            <h5 class="text-success" style="margin-left: 200px">{{ $event->title }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text" style="margin-left: 200px">{{ $event->dateTime }}</p>
                        </div>
                        <div class="col-1">
                            <a href="/editEvent?id={{ $event->id }}"
                                style="text-decoration: none; color: white; background: #3d53cd; padding: 4px 8px; border-radius: 4px">Edit
                                Event</a>
                        </div>
                        <div class="col-2">
                            <a href="/deleteEvent?id={{ $event->id }}"
                                style="text-decoration: none; color: white; background: #b70b0b; padding: 4px 8px; border-radius: 4px">Delete
                                Event</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <h3 class="text">No events yet</h3>
                        <p class="text-success">Check back soon!</p>
                    </div>
                @endforelse
            </div>
            <div class="row">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
