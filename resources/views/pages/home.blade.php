<?php
use App\Models\User;
use App\Models\UserEvent;
?>

@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'home'])
@endsection

@section('content')
    <div class="mt-5 px-3">
        <div class="row" style="background-image: url('{{ asset('images/search.png') }}'); background-size: cover; background-position: center; width: 100%; max-width: 2000px; height: 270px; margin: 0; padding: 0;">
            <h3 class="text-white" style="font-size: 30px; text-align: center; padding-top: 70px;">Together We Can Change The World</h3>
            <form action="/allEvents" class="d-flex justify-content-center mt-3">
                @csrf
                <div class="input-group" style="width: 400px; height: 50px;">
                    <input type="text" name="search" id="search" placeholder="Search Activities" class="form-control">
                    <button type="submit" value="submit" class="btn btn-success">Search</button>
                </div>
            </form>
        </div>
        <div class="row" style="background-color: #E8FFEC;">
            <h4 style="padding-top: 20px; padding-bottom: 20px;">All Volunteering Activities</h4>
            <div class="row d-flex flex-row flex-wrap">
                @forelse ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" style="background-color: #C5F1CD;">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="{{ $event->image }}" class="img-fluid rounded-start" alt="Event Image" style="width: 100%; height: 220px;">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->title }}</h5>
                                        <p class="card-text">By {{ User::find($event->user_id)->name }}</p>
                                        <p class="card-text" style="font-weight: bold;">
                                            {{ $event->quota - UserEvent::where('event_id', $event->id)->count() }}
                                            slots available
                                        </p>
                                        <p class="card-text">{{ $event->dateTime }}</p>
                                        <p class="card-text">
                                            <i class="fas fa-map-marker-alt" style="color: black;"></i> {{ $event->location }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
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
                <h4 style="padding-top: 7px; font-size: 1.2em;">Click the button below to start posting your own volunteer event.</h4>
                <a href="/createEvent" class="btn btn-success" style="margin-top: 10px; padding: 10px 20px;">CREATE EVENT</a>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/create.png') }}" class="img-fluid" alt="Create Event" style="width: 350px; height: 350px;">
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
