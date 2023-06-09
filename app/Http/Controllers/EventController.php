<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventAttendee;
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

        $assistants = UserEventAttendee::where('event_id', $id)->with('user')->get()->pluck('user.name');

        return (view("event.showevent", ['event' => $event, 'assistants' => $assistants]));
    }

    public function register($id)
    {

        $users = User::all();

        return (view("event.register", ['id' => $id, 'users' => $users]));
    }

    public function storeAttendee($idEvent, Request $request)
    {

        $assistantEvent = new UserEventAttendee();

        $assistantEvent->user_id = $request->input('assistant');
        $assistantEvent->event_id = $idEvent;

        if (UserEventAttendee::where('user_id', '=', $request->input('assistant'))->where('event_id', '=', $idEvent)->exists()) {
            return redirect()->back();
        } else {
            $assistantEvent->save();
            return redirect('/events');
        }
    }

    public function edit($id)
    {

        $event = Event::find($id);

        return (view("event.edit", ['event' => $event]));
    }

    public function update($id, Request $request)
    {

        $event = Event::find($id);

        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');

        $event->save();

        return redirect('/events');
    }
}
