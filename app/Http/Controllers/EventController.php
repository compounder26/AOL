<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png|max:2048',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
            'organizer' => 'required|string|max:100',
            'notes' => 'required|string',
            'slots' => 'required|integer|min:1',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('event_photos', $fileName, 'public');
            $validated['photo'] = $filePath;
        }

        // Save the event data
        $validated['created_by'] = Auth::id(); // Assign the authenticated user as the creator
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }


    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Check if the user has already registered for the event
        if (Auth::user()->events()->where('events.id', $id)->exists()) {
            return redirect()->route('events.show', $id)->with('error', 'You have already registered for this event.');
        }

        // Check if slots are available
        if ($event->slots > 0) {
            DB::transaction(function () use ($event) {
                // Decrement available slots
                $event->slots -= 1;
                $event->save();

                // Attach the event to the user
                Auth::user()->events()->attach($event->id);
            });

            return redirect()->route('events.show', $id)->with('success', 'You have successfully registered for the event!');
        } else {
            return redirect()->route('events.show', $id)->with('error', 'Sorry, this event is already full.');
        }
    }
}
