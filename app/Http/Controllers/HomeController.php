<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index(){
        $events = Event::inRandomOrder()->limit(4)->get();
        return view('pages.home', ['events' => $events]);
    }

}
