<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index()
    {
        // Get upcoming events
        $upcomingEvents = Event::where('is_active', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        // Get past events
        $pastEvents = Event::where('is_active', true)
            ->where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->get();

        return view('back.event', compact('upcomingEvents', 'pastEvents'));
    }

    /**
     * Display the specified event
     */
    public function show(Event $event)
    {
        // Check if event is active
        if (!$event->is_active) {
            abort(404);
        }

        return view('events.show', compact('event'));
    }

    /**
     * Register authenticated user for an event
     */
    public function register(Request $request, Event $event)
    {
        // Check if event is active
        if (!$event->is_active) {
            return redirect()->back()->with('error', 'This event is not available for registration.');
        }

        // Check if registration is still open (assuming event_date is in the future)
        if ($event->event_date < now()) {
            return redirect()->back()->with('error', 'Registration for this event has closed.');
        }

        // Check if user is already registered
        if ($request->user()->events()->where('event_id', $event->id)->exists()) {
            return redirect()->back()->with('info', 'You are already registered for this event.');
        }

        // Register user for event
        $request->user()->events()->attach($event->id);

        return redirect()->route('events.index')
            ->with('success', 'Successfully registered for ' . $event->event_name);
    }
}
