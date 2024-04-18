<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    public function event()
    {
        return view('events.index',

            [
                'event' => Event::take(5)->get()
            ]);
    }
}
