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
        $clubs = Club::all();
        $departments = Department::all();
        $events = Event::query();

        if ($request->filled('club_id')) {
            $events->where('club_id', $request->input('club_id'));
        }

        $events = $events->get()->map(function ($event) {
            return [
                'title' => $event->title,
                'published_at' => $event->published_at,
                'body' => $event->body,
                'department_id' => $event->department_id,
                'academic_year' => $event->academic_year,
                'club_id' => $event->club_id,
                'image' => $event->getThumbnailUrl(), // Add the full image URL here
            ];
        });

        if ($request->expectsJson()) {
            return response()->json($events);
        }

        return view('events.index', compact('events', 'clubs', 'departments'));
    }

    public function store(Request $request) {
        $event = Event::create($request->all());
        event(new NewContentCreated($event));
        // Any additional logic
    }
}
