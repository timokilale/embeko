<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index(Request $request)
    {
        $upcomingEvents = Event::upcoming()->take(5)->get();
        $pastEvents = Event::past()->take(5)->get();

        return response()->json([
            'upcoming' => $upcomingEvents,
            'past' => $pastEvents
        ]);
    }

    /**
     * Display a listing of upcoming events.
     */
    public function upcoming()
    {
        $events = Event::upcoming()->paginate(10);
        return response()->json($events);
    }

    /**
     * Display a listing of past events.
     */
    public function past()
    {
        $events = Event::past()->paginate(10);
        return response()->json($events);
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $event = new Event();
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->is_featured = $request->has('is_featured');
        // No user_id needed

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('events', 'public');
            $event->featured_image = $imagePath;
        }

        $event->save();

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event
        ], 201);
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $event->title = $request->title;

        // Only update slug if title has changed
        if ($event->title !== $request->title) {
            $event->slug = Str::slug($request->title);
        }

        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->is_featured = $request->has('is_featured');

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($event->featured_image && Storage::disk('public')->exists($event->featured_image)) {
                Storage::disk('public')->delete($event->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('events', 'public');
            $event->featured_image = $imagePath;
        }

        $event->save();

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event
        ]);
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        // Delete featured image if exists
        if ($event->featured_image && Storage::disk('public')->exists($event->featured_image)) {
            Storage::disk('public')->delete($event->featured_image);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
