<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    // public function indexi()
    // {
    //     $user = Auth::user();
    //     $now = Carbon::now();
    //     $membership = Membership::where('user_id', $user->id)->first();

    //     // Get upcoming events
    //     $upcomingEvents = Event::where('is_active', true)
    //         ->where('event_date', '>=', now())
    //         ->orderBy('event_date', 'asc')
    //         ->paginate(5);

    //     // Get past events
    //     $pastEvents = Event::where('is_active', true)
    //         ->where('event_date', '<', now())
    //         ->orderBy('event_date', 'desc')
    //         ->take(5)
    //         ->get();

    //     // Get events for the current month
    //     $currentMonthEvents = Event::where('is_active', true)
    //         ->whereMonth('event_date', now()->month)
    //         ->whereYear('event_date', now()->year)
    //         ->get();

    //     // Get user's registered events
    //     $registeredEvents = $user->events()->wherePivot('is_active', true)->get();

    //     // Calculate stats
    //     $stats = [
    //         'upcoming_events' => Event::where('is_active', true)
    //             ->where('event_date', '>=', now())
    //             ->count(),
    //         'registered_events' => $registeredEvents->count(),
    //         'events_this_month' => $currentMonthEvents->count(),
    //         'past_events' => Event::where('is_active', true)
    //             ->where('event_date', '<', now())
    //             ->count(),
    //     ];

    //     // Get event days for calendar
    //     $eventDays = $currentMonthEvents->map(function ($event) {
    //         return $event->event_date->day;
    //     })->toArray();




    //     // 
    //     // ###

    //     // Get events for the current month
    //     $startOfMonth = $now->copy()->startOfMonth();
    //     $endOfMonth = $now->copy()->endOfMonth();

    //     $events = Event::whereBetween('event_date', [$startOfMonth, $endOfMonth])->get();

    //     // Build event days array and events by date
    //     $eventDays = [];
    //     $eventsByDate = [];

    //     foreach ($events as $event) {
    //         $eventDate = Carbon::parse($event->event_date);
    //         $day = $eventDate->day;

    //         // Add to event days if not already there
    //         if (!in_array($day, $eventDays)) {
    //             $eventDays[] = $day;
    //         }

    //         // Add to events by date
    //         $dateKey = $eventDate->format('Y-m-d');
    //         if (!isset($eventsByDate[$dateKey])) {
    //             $eventsByDate[$dateKey] = [];
    //         }

    //         $eventsByDate[$dateKey][] = [
    //             'id' => $event->id,
    //             'event_name' => $event->event_name,
    //             'event_description' => $event->event_description,
    //             'location' => $event->location,
    //             'price' => $event->price,
    //             'event_date' => $event->event_date,
    //         ];
    //     }
    //     //### 

    //     return view('back.events', compact(
    //         'upcomingEvents',
    //         'eventsByDate',
    //         'pastEvents',
    //         'stats',
    //         'registeredEvents',
    //         'eventDays',
    //         'membership'
    //     ));
    // }

    public function index()
    {
        $user = Auth::user();
        $now = Carbon::now();
        $membership = Membership::where('user_id', $user->id)->first();

        // Get upcoming events
        $upcomingEvents = Event::where('is_active', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->paginate(5);

        // Get past events
        $pastEvents = Event::where('is_active', true)
            ->where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->take(5)
            ->get();

        // Get events for the current month
        $currentMonthEvents = Event::where('is_active', true)
            ->whereMonth('event_date', now()->month)
            ->whereYear('event_date', now()->year)
            ->get();

        // Get user's registered events
        $registeredEvents = $user->events()->wherePivot('is_active', true)->get();

        // Calculate stats
        $stats = [
            'upcoming_events' => Event::where('is_active', true)
                ->where('event_date', '>=', now())
                ->count(),
            'registered_events' => $registeredEvents->count(),
            'events_this_month' => $currentMonthEvents->count(),
            'past_events' => Event::where('is_active', true)
                ->where('event_date', '<', now())
                ->count(),
        ];

        // Calculate the calendar view range (includes previous and next month days)
        $firstDayOfMonth = $now->copy()->startOfMonth()->dayOfWeek;
        $daysInMonth = $now->daysInMonth;

        // Start date is the first day shown in the calendar (could be from previous month)
        $startDate = $now->copy()->startOfMonth()->subDays($firstDayOfMonth);
        // End date is 42 days later (6 weeks)
        $endDate = $startDate->copy()->addDays(41); // 0-indexed, so 41 days after start

        // Get events for the entire calendar view (not just current month)
        $events = Event::where('is_active', true)
            ->whereBetween('event_date', [$startDate, $endDate])
            ->get();

        // Build event days array and events by date
        $eventDays = [];
        $eventsByDate = [];

        foreach ($events as $event) {
            $eventDate = Carbon::parse($event->event_date);
            $day = $eventDate->day;

            // If the event is in the current month, add to eventDays for highlighting
            if ($eventDate->month == $now->month && $eventDate->year == $now->year) {
                if (!in_array($day, $eventDays)) {
                    $eventDays[] = $day;
                }
            }

            // Add to events by date for all dates in the calendar view
            $dateKey = $eventDate->format('Y-m-d');
            if (!isset($eventsByDate[$dateKey])) {
                $eventsByDate[$dateKey] = [];
            }

            $eventsByDate[$dateKey][] = [
                'id' => $event->id,
                'event_name' => $event->event_name,
                'event_description' => $event->event_description,
                'location' => $event->location,
                'price' => $event->price,
                'event_date' => $event->event_date,
            ];
        }

        return view('back.events', compact(
            'upcomingEvents',
            'eventsByDate',
            'pastEvents',
            'stats',
            'registeredEvents',
            'eventDays',
            'membership'
        ));
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
