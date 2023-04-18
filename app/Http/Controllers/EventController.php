<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
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

    public function show($id)
    {

        $event = Event::find($id);

        return (view("event.showevent", ['event' => $event]));
    }

    public function register($id)
    {

        $users = User::all();

        return (view("event.register", ['id' => $id, 'users' => $users]));
    }

    public function storeAttendee($idEvent, Request $request)
    {

        $assistantEvent = new UserEventsAttendee();

        $assistantEvent->user_id = $request->input('assistant');

        if (UserEventsAttendee::where('user_id', '=', $request->input('assistant'))->where('event_id', '=', $idEvent)->exists()) {
            return redirect()->back();
        } else {
            $assistantEvent->save();
            return redirect('/events');
        }
    }
}
