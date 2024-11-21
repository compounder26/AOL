<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Home Page
    public function home()
    {
        if (Auth::check()) {
            return redirect()->route('events.index');
        }
        
        // Default home page view for guests
        return view('home');
    }

    // Events Index
    public function index()
    {
        $events = Event::all(); // Fetch all events
        return view('events.index', compact('events')); // Pass events to the view
    }
    
    public function show($id)
    {
        $event = Event::findOrFail($id); // Fetch event by ID
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all()); // Save new event
        return redirect('/')->with('success', 'Event created successfully!');
    }
}
