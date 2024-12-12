<?php
use App\Models\User;
use App\Models\UserEvent;
?>

@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'home'])
@endsection

@section('content')
    <div class="mt-5">
        <div class="row"
            style="background-image: url('{{ asset('images/search.png') }}'); background-size: cover; background-position: center; width: 100%; max-width: 2000px; height: 270px; margin: 0; padding: 0;">
            <h3 class="text-white" style="font-size: 30px; text-align: center; padding-top: 70px;">Together We Can Change The
                World</h3>
            <form action="/allEvents" class="d-flex justify-content-center mt-3">
                @csrf
                <div class="input-group" style="width: 400px; height: 50px;">
                    <input type="text" name="search" id="search" placeholder="Search Activities" class="form-control">
                    <button type="submit" value="submit" class="btn btn-success">Search</button>
                </div>
            </form>
        </div>
        <div class="px-3">
            <div class="row" style="background-color: #E8FFEC;">
                <h4 style="padding-top: 20px; padding-bottom: 20px;">Featured Volunteering Activities</h4>
                <div class="row d-flex justify-content-center">
                    @forelse ($events->take(3) as $event)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm" style="background-color: #C5F1CD; border-radius: 15px; overflow: hidden;">
                                <img src="{{ $event->image }}" class="card-img-top" alt="Event Image"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                                    <p class="card-text mb-2">
                                        <i class="fas fa-user me-2"></i>
                                        {{ User::find($event->user_id)->name }}
                                    </p>
                                    <p class="card-text mb-2" style="color: #28a745; font-weight: bold;">
                                        <i class="fas fa-users me-2"></i>
                                        {{ $event->quota - UserEvent::where('event_id', $event->id)->count() }}
                                        slots available
                                    </p>
                                    <p class="card-text mb-2">
                                        <i class="fas fa-calendar me-2"></i>
                                        {{ $event->dateTime }}
                                    </p>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $event->location }}
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
            </div>
            @if ($events)
                <div class="row" style="background-color: #E8FFEC;">
                    <div class="col-12 d-flex justify-content-center" style="padding-bottom: 30px;">
                        <a href="/allEvents" class="btn btn-success">View All Activities</a>
                    </div>
                </div>
            @endif
            <div class="row" style="background-color: #d3e4cd; padding: 20px; border-radius: 10px;">
                <div class="col-md-8" style="padding-top: 100px;">
                    <h2 style="font-size: 2.5em;">Want to create your own volunteer event?</h2>
                    <h4 style="padding-top: 7px; font-size: 1.2em;">Click the button below to start posting your own
                        volunteer
                        event.</h4>
                    <a href="/createEvent" class="btn btn-success" style="margin-top: 10px; padding: 10px 20px;">CREATE
                        EVENT</a>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/create.png') }}" class="img-fluid" alt="Create Event"
                        style="width: 350px; height: 350px;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
