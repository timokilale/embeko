<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $upcomingEvents = Event::upcoming()
            ->paginate(6, ['*'], 'upcoming');

        $pastEvents = Event::past()
            ->paginate(6, ['*'], 'past');

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    /**
     * Display the specified event.
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        // Get other upcoming events for sidebar
        $otherEvents = Event::upcoming()
            ->where('id', '!=', $event->id)
            ->take(5)
            ->get();

        return view('events.show', compact('event', 'otherEvents'));
    }
}
