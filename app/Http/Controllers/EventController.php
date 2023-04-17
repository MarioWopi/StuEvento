<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function create()
    {
        return (view("event.create"));
    }

    public function store(Request $request)
    {

        $event = new Event();

        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->user_id = Auth::user()->id;

        $event->save();

        return redirect("events");
    }

    public function index()
    {

        $events = Event::where('user_id', Auth::user()->id)->get();

        return (view("event.index", ['events' => $events]));
    }
}
