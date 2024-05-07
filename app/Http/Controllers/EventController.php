<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Club;
use App\Models\Department;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('event', [
            'latestEvent' => Event::published()->latest('published_at')->take(9)->get()
        ]);
    }
//
//    public function event()
//    {
//        return view('events.index');
//    }
//
//    public function events(Request $request)
//    {
//        $events = Event::all(); // Fetch all events from the database
//
//        return view('events.index')
//            ->with('events', $events)
//            ->with('events_json', $events->toJson());
//    }

//    public function getEvents()
//    {
//        $events = Event::all(); // Fetch all events from the database
//        return response()->json($events); // Return events as JSON
//    }

//    public function calendar()
//    {
//        return view('calendar');
//    }
//
//    public function events()
//    {
//        $events = Event::all(); // Fetch all events from the database
//        return response()->json($events);
//    }

    public function index(Request $request)
    {
        // Retrieve clubs from the database
        $clubs = Club::all();
        $departments = Department::all();

        // Retrieve club ID from the request
        $clubId = $request->query('club_id');

        // Fetch events associated with the selected club ID
        if ($clubId) {
            $events = Event::where('club_id', $clubId)->get();
        } else {
            // If no club ID is provided, retrieve all events
            $events = Event::all();
        }

        // Check if the request is expecting a JSON response
        if ($request->expectsJson()) {
            // Return events data as JSON
            return response()->json($events);
        }

        // Pass events data and clubs data to the view
        return view('events.index', compact('events', 'clubs', 'departments'));
    }
}
