<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Event;
use App\Models\UserEvent;

class EventController extends Controller
{
    public function index(Request $request){
        $search = "";
        if($request->search){
            $search = $request->search;
        }
        $events = Event::where('title', 'LIKE', '%' . $search . '%')->
        orWhereIn('category_id', Category::where('name', 'LIKE', '%' . $search . '%')->pluck('id'))->paginate(3);
        return view('pages.events', ['events' => $events]);
    }

    public function create(){
        $categories = Category::all();
        return view('pages.create', ['categories' => $categories]);
    }

    public function createEvent(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'dateTime' => 'required|date',
            'organizer' => 'required',
            'orgEmail' => 'required|email',
            'location' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'quota'=> 'required|integer',
        ]);
        $image = $request->image;
        $image_name = time() . '.' . $image->extension();
        Storage::putFileAs('public/images', $image, $image_name);
        $image_name = 'storage/images/' . $image_name;
        Event::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title'=> $request->title,
            'dateTime' => $request->dateTime,
            'organizer'=> $request->organizer,
            'orgEmail'=> $request->orgEmail,
            'location' => $request->location,
            'image' => $image_name,
            'description' => $request->description,
            'note' => $request->note,
            'quota' => $request->quota,
        ]);

        return redirect('/myEvent');
    }

    public function detail(Request $request){
        $event = Event::find($request->id);
        return view('pages.eventDetail', ['event' => $event]);
    }

    public function regEvent(Request $request){
        UserEvent::create([
            'user_id' => Auth::user()->id,
            'event_id' => $request->id
        ]);
        return redirect('/');
    }

    public function registeredEvents(){
        $events = Event::whereIn('id', UserEvent::where('user_id', Auth::user()->id)->pluck('event_id'))->get();
        return view('pages.RegisteredEvents', ['events' => $events]);
    }

    public function registeredDetail(Request $request){
        $event = Event::find($request->id);
        return view('pages.registeredDetail', ['event' => $event]);
    }
}
