@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'events'])
@endsection

@section('content')
    <div class="container-fluid" style="background-color: #E8FFEC;">
        <br>
        <br>
        <div class="heading">
            <h1>Events</h1>
        </div>

        <div class="row d-flex justify-content-center">
            @forelse ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="background-color: #C5F1CD; border-radius: 15px; overflow: hidden;">
                        <img src="{{ $event->image }}" class="card-img-top" alt="Event Image"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                            <p class="card-text mb-2">
                                <i class="fas fa-calendar me-2"></i>
                                {{ $event->dateTime }}
                            </p>
                            <a href="/events?id={{ $event->id }}" class="btn btn-success w-100 mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h1>No Events Available Yet!</h1>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12">{{ $events->links() }}</div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
