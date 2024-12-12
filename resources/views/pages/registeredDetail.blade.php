<?php
use App\Models\Event;
use App\Models\UserEvent;
?>

@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'events'])
@endsection

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Music&family=Yaldevi:wght@200..700&display=swap" rel="stylesheet">
</head>


<body style="padding-top:200px; font-family:'Noto Music'">
    <div class="container-fluid" style="margin-top:100px">
        <div class="row align-items-center" style="margin:0 40px; display:flex; justify-content:space-between">
            <div class="back-container" style="margin-bottom:10px; align-items:center">
                <a href="javascript:history.back()" class="back-link" style="display:flex; align-items:center; text-decoration:none; color:rgb(100, 100, 100); font-size:18px">
                    <h4 style="font-weight: bold">< Back</h4>
                </a>
            </div>
            <h1>{{ $event->title }}</h1>
        </div>
        <div class="row" style="gap:30px">
            <div class="col-md-4 mb-5">
                <img src="{{ $event->image }}" height="500px" width="400px" alt="Event Image" style="margin-top:50px;margin-left:50px">
            </div>
            <div class="col-md-7" style="margin-top:45px; margin-right:50px">
                <p style="font-weight:bold">Description</p>
                <p style="font-style:italic">{{$event->description}}</p>
                <p><span style="font-weight: bold">Location: </span><span>{{ $event->location }}</span></p>
                <p><span style="font-weight: bold">Date: </span><span>{{ $event->dateTime }}</span></p>
                <p><span style="font-weight: bold">Organizer: </span><span>{{ $event->organizer }}</span></p>
                <p><span style="font-weight: bold">Slots Available: </span><span>{{ $event->quota -UserEvent::where('event_id', $event->id)->get()->count() }}</span></p>
                <p><span style="font-weight: bold">Special Notes: </span><span>{{ $event->note }}</span></p>

                <div class="d-flex flex-column align-items-center gap-3 mt-4">
                    <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#contactModal" style="max-width: 400px; background-color: rgb(172, 172, 172); border:none">
                        <i class="bi bi-envelope"></i>
                        <span style="font-size:18px; margin-left: 8px">Contact Organizer</span>
                    </button>
                </div>

                
                <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampletModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color:rgb(195, 223, 195)">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Organizer Information</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Organizer Name: {{ $event->organizer }}</p>
                                <p>Organizer Email: {{ $event->orgEmail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('footer')
    @include('components.footer')
@endsection