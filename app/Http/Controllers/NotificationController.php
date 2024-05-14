<?php

// NotificationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch new events (you can define your logic to determine new events)
        $newEvents = Event::where('published_at', '>=', now()->subDays(7))->get();

        // Return the view with the new events
        return view('navigation-menu', ['newEvents' => $newEvents]);
    }
}

