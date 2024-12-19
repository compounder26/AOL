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
        orWhereIn('category_id', Category::where('name', 'LIKE', '%' . $search . '%')->pluck('id'))->paginate(6);
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
        $image_name = asset('storage/images/' . $image_name);
        $event = new Event();
        $event->user_id = Auth::user()->id;
        $event->category_id = $request->category;
        $event->title = $request->title;
        $event->dateTime = $request->dateTime;
        $event->organizer = $request->organizer;
        $event->orgEmail = $request->orgEmail;
        $event->image = $image_name;
        $event->location = $request->location;
        $event->description = $request->description;
        if($request->note){
            $event->note = $request->note;
        }
        $event->quota = $request->quota;
        $event->save();
        return redirect('/myEvent');
    }

    public function detail(Request $request){
        $event = Event::find($request->id);
        $isRegistered = UserEvent::where('user_id', Auth::user()->id)
            ->where('event_id', $request->id)
            ->exists();
        return view('pages.eventDetail', ['event' => $event, 'isRegistered' => $isRegistered]);
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
        return view('pages.registeredEvents', ['events' => $events]);
    }

    public function registeredDetail(Request $request){
        $event = Event::find($request->id);
        return view('pages.registeredDetail', ['event' => $event]);
    }

    public function editEvent(Request $request){
        $event = Event::find($request->id);
        $categories = Category::all();
        return view('pages.editEvent', ['event' => $event, 'categories' => $categories]);
    }

    public function deleteEvent(Request $request){
        Event::where('id', $request->id)->delete();
        return redirect('/myEvent');
    }

    public function commenceEditEvent(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'dateTime' => 'required|date',
            'organizer' => 'required',
            'orgEmail' => 'required|email',
            'location' => 'required',
            'image' => 'image',
            'description' => 'required',
            'quota'=> 'required|integer',
        ]);
        $event = Event::find($request->id);
        $event->title = $request->title;
        $event->category_id = $request->category;
        $event->dateTime = $request->dateTime;
        $event->organizer = $request->organizer;
        $event->orgEmail = $request->orgEmail;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->note = $request->note;
        $event->quota = $request->quota;

        if($request->hasFile('image')){
            Storage::delete($event->image);
            $image = $request->image;
            $image_name = time() . '.' . $image->extension();
            Storage::putFileAs('public/images', $image, $image_name);
            $image_name = 'storage/images/' . $image_name;
            $event->image = $image_name;
        }

        $event->save();
        return redirect('/myEvent');
    }
}
