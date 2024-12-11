<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class MyEventsController extends Controller
{
    public function index(){
        $myEvents = Event::where('user_id', Auth::user()->id)->paginate(3);
        return view('pages.myEvents', ['events' => $myEvents]);
    }
}
