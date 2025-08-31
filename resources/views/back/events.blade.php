@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-dark-800">Events Calendar</h1>
            <p class="text-dark-500">Discover and register for upcoming NIOTIM events</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <i class="fas fa-bell text-dark-400 text-xl"></i>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">{{ $upcomingEvents->count() }}</span>
            </div>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars text-2xl text-dark-500"></i>
            </div>
        </div>
    </header>

    <!-- Stats Section -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Upcoming Events</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['upcoming_events'] }}</h3>
                </div>
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-plus text-primary-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Scheduled for the next 30 days</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Registered Events</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['registered_events'] }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-check text-green-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Events you've registered for</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">This Month</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['events_this_month'] }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-day text-blue-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Events happening this month</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Past Events</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['past_events'] }}</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-history text-purple-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Events you've attended</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h3 class="font-semibold text-dark-800">Event Calendar</h3>
            <p class="text-dark-500 text-sm">Browse and filter upcoming events</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-3">
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Categories</option>
                    <option>Conferences</option>
                    <option>Workshops</option>
                    <option>Networking</option>
                    <option>Training</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Status</option>
                    <option>Upcoming</option>
                    <option>Ongoing</option>
                    <option>Completed</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-500"></i>
                </div>
                <input type="text" class="bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" placeholder="Search events...">
            </div>
        </div>
    </div>

    <!-- Events Calendar and List -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Calendar Section -->
        <div class="lg:col-span-1 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-dark-800 mb-4">{{ now()->format('F Y') }}</h2>
            <div class="grid grid-cols-7 gap-2 mb-2">
                <div class="text-center text-xs font-medium text-dark-500">Sun</div>
                <div class="text-center text-xs font-medium text-dark-500">Mon</div>
                <div class="text-center text-xs font-medium text-dark-500">Tue</div>
                <div class="text-center text-xs font-medium text-dark-500">Wed</div>
                <div class="text-center text-xs font-medium text-dark-500">Thu</div>
                <div class="text-center text-xs font-medium text-dark-500">Fri</div>
                <div class="text-center text-xs font-medium text-dark-500">Sat</div>
            </div>
            <div class="grid grid-cols-7 gap-2" id="calendar-days">
                @php
                    $firstDayOfMonth = now()->startOfMonth()->dayOfWeek;
                    $daysInMonth = now()->daysInMonth;
                    $currentDay = now()->day;
                    $currentMonth = now()->month;
                    $currentYear = now()->year;
                    
                    // FIX: Calculate next month correctly
                    $nextMonthStart = now()->startOfMonth()->addMonth();
                @endphp
                
                <!-- Previous month days -->
                @for ($i = 0; $i < $firstDayOfMonth; $i++)
                    @php
                        $prevMonthDay = now()->startOfMonth()->subDays($firstDayOfMonth - $i)->day;
                        $prevMonth = now()->startOfMonth()->subDays($firstDayOfMonth - $i)->month;
                        $prevYear = now()->startOfMonth()->subDays($firstDayOfMonth - $i)->year;
                    @endphp
                    <div class="calendar-day text-dark-400" data-date="{{ $prevYear }}-{{ str_pad($prevMonth, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($prevMonthDay, 2, '0', STR_PAD_LEFT) }}">
                        {{ $prevMonthDay }}
                    </div>
                @endfor
                
                <!-- Current month days -->
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $dateString = $currentYear . '-' . str_pad($currentMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                        $hasEvent = in_array($day, $eventDays);
                        $dayEvents = $eventsByDate[$dateString] ?? [];
                    @endphp
                    <div class="calendar-day {{ $hasEvent ? 'has-event' : '' }} {{ $day == $currentDay ? 'selected' : '' }}"
                         data-date="{{ $dateString }}"
                         data-events="{{ json_encode($dayEvents) }}">
                        {{ $day }}
                    </div>
                @endfor
                
                <!-- Next month days - FIXED -->
                @php
                    $daysToShow = 42 - $daysInMonth - $firstDayOfMonth; // 6 weeks of days
                @endphp
                
                @for ($i = 1; $i <= $daysToShow; $i++)
                    @php
                        $nextMonthDay = $i;
                        $nextMonth = $nextMonthStart->month;
                        $nextYear = $nextMonthStart->year;
                        $dateString = $nextYear . '-' . str_pad($nextMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($nextMonthDay, 2, '0', STR_PAD_LEFT);
                    @endphp
                    <div class="calendar-day text-dark-400" data-date="{{ $dateString }}">
                        {{ $nextMonthDay }}
                    </div>
                @endfor
            </div>
            
            <div class="mt-6">
                <h3 class="font-semibold text-dark-700 mb-3">Event Legend</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-primary-500 mr-2"></div>
                        <span class="text-sm text-dark-600">Conference</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-secondary-500 mr-2"></div>
                        <span class="text-sm text-dark-600">Workshop</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-accent-500 mr-2"></div>
                        <span class="text-sm text-dark-600">Networking</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Events List -->
        <div class="lg:col-span-2 space-y-4" id="events-container">
            @forelse($upcomingEvents as $event)
            <div class="event-card" data-event-id="{{ $event->id }}">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-1/4">
                        @php
                            $eventDate = \Carbon\Carbon::parse($event->event_date);
                            $status = $eventDate->isPast() ? 'completed' : ($eventDate->isToday() ? 'ongoing' : 'upcoming');
                            
                            $statusClass = [
                                'upcoming' => 'status-upcoming',
                                'ongoing' => 'status-ongoing',
                                'completed' => 'status-completed'
                            ][$status];
                            
                            $statusText = [
                                'upcoming' => 'Upcoming',
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed'
                            ][$status];
                            
                            $bgColorClass = [
                                'upcoming' => 'bg-primary-50',
                                'ongoing' => 'bg-yellow-50',
                                'completed' => 'bg-gray-50'
                            ][$status];
                            
                            $textColorClass = [
                                'upcoming' => 'text-primary-500',
                                'ongoing' => 'text-yellow-500',
                                'completed' => 'text-gray-500'
                            ][$status];
                        @endphp
                        
                        <div class="{{ $bgColorClass }} rounded-lg p-3 text-center">
                            <p class="{{ $textColorClass }} font-bold text-lg">{{ $eventDate->format('d') }}</p>
                            <p class="{{ $textColorClass }} font-medium">{{ $eventDate->format('M') }}</p>
                            <p class="text-dark-500 text-sm">{{ $eventDate->format('Y') }}</p>
                            <div class="mt-2">
                                <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/4">
                        <h3 class="font-bold text-lg text-dark-800 mb-2">{{ $event->event_name }}</h3>
                        <p class="text-dark-600 mb-2">{{ $event->event_description }}</p>
                        <div class="flex flex-wrap items-center gap-3 text-sm text-dark-500">
                            <span><i class="fas fa-clock mr-1"></i> {{ $eventDate->format('g:i A') }}</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $event->location ?? 'TBA' }}</span>
                        </div>
                    </div>
                    <div class="md:w-1/4 flex flex-col justify-between">
                        <div class="mb-4">
                            <p class="text-2xl font-bold text-dark-800">₦{{ number_format($event->price ?? 0, 2) }}</p>
                            <p class="text-dark-500 text-sm">Member price</p>
                        </div>
                        @if($status === 'upcoming')
                            @if(Auth::user()->events->contains($event->id))
                                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium cursor-not-allowed">
                                    Registered
                                </button>
                            @else
                                <form action="{{ route('events.register', $event) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">
                                        Register Now
                                    </button>
                                </form>
                            @endif
                        @elseif($status === 'ongoing')
                            <button class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg font-medium">
                                Happening Now
                            </button>
                        @else
                            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium cursor-not-allowed">
                                Completed
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="event-card text-center py-8">
                <i class="fas fa-calendar-times text-4xl text-primary-500 mb-4"></i>
                <h3 class="text-xl font-bold text-dark-800 mb-2">No Upcoming Events</h3>
                <p class="text-dark-500">Check back later for new events!</p>
            </div>
            @endforelse
        </div>
    </div>
    
    <!-- Event Details Modal -->
    <div id="event-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-dark-800" id="modal-date">Event Details</h3>
                <button id="close-modal" class="text-dark-500 hover:text-dark-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="modal-content" class="max-h-96 overflow-y-auto">
                <!-- Event details will be inserted here -->
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    @if($upcomingEvents->hasPages())
    <div class="mt-8 flex items-center justify-between">
        <div>
            <p class="text-sm text-dark-700">
                Showing <span class="font-medium">{{ $upcomingEvents->firstItem() }}</span> to <span class="font-medium">{{ $upcomingEvents->lastItem() }}</span> of <span class="font-medium">{{ $upcomingEvents->total() }}</span> results
            </p>
        </div>
        <div class="flex space-x-2">
            @if($upcomingEvents->onFirstPage())
            <span class="flex items-center px-4 py-2 text-sm font-medium text-dark-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                Previous
            </span>
            @else
            <a href="{{ $upcomingEvents->previousPageUrl() }}" class="flex items-center px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                Previous
            </a>
            @endif

            @foreach($upcomingEvents->getUrlRange(1, $upcomingEvents->lastPage()) as $page => $url)
                @if($page == $upcomingEvents->currentPage())
                <span class="px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-primary-500 rounded-lg">
                    {{ $page }}
                </span>
                @else
                <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    {{ $page }}
                </a>
                @endif
            @endforeach

            @if($upcomingEvents->hasMorePages())
            <a href="{{ $upcomingEvents->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                Next
            </a>
            @else
            <span class="px-4 py-2 text-sm font-medium text-dark-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                Next
            </span>
            @endif
        </div>
    </div>
    @endif

     <!-- Footer -->
    <footer class="bg-white shadow-md mt-8 py-4">
        <div class="container mx-auto px-4 text-center">
            <p class="text-dark-500 text-sm font-medium">
                Designed by 
                <span class="text-primary-500 font-semibold">
                    <a href="https://wa.link/1tz78w">Paramount Computer</a>
                </span>
            </p>
        </div>
    </footer>
@endsection

@push('styles')
<style>
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-upcoming {
        background-color: #f0f9f4;
        color: #0a914c;
    }
    
    .status-ongoing {
        background-color: #fef6e6;
        color: #f5a623;
    }
    
    .status-completed {
        background-color: #f3f4f6;
        color: #6b7280;
    }
    
    .filter-bar {
        background: white;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }
    
    .event-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .event-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    .calendar-day {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
    }
    
    .calendar-day.has-event {
        background-color: #f0f9f4;
        color: #0a914c;
        font-weight: 600;
    }
    
    .calendar-day.has-event::after {
        content: '';
        position: absolute;
        bottom: 2px;
        width: 6px;
        height: 6px;
        background-color: #0a914c;
        border-radius: 50%;
    }
    
    .calendar-day.selected {
        background-color: #0a914c;
        color: white;
    }
    
    .calendar-day.selected::after {
        background-color: white;
    }
    
    .calendar-day:hover:not(.text-dark-400) {
        background-color: #e6f7ee;
    }
    
    .event-highlight {
        animation: pulse 2s infinite;
        box-shadow: 0 0 0 4px rgba(10, 145, 76, 0.2);
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(10, 145, 76, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(10, 145, 76, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(10, 145, 76, 0);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarDays = document.querySelectorAll('.calendar-day');
        const eventsContainer = document.getElementById('events-container');
        const eventModal = document.getElementById('event-modal');
        const modalContent = document.getElementById('modal-content');
        const modalDate = document.getElementById('modal-date');
        const closeModal = document.getElementById('close-modal');
        
        // Event registration button handlers
        const registerButtons = document.querySelectorAll('.btn-primary');
        registerButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!this.classList.contains('cursor-not-allowed')) {
                    const eventCard = this.closest('.event-card');
                    const eventTitle = eventCard.querySelector('h3').textContent;
                    
                    // Show a confirmation dialog
                    if (!confirm(`Are you sure you want to register for: ${eventTitle}?`)) {
                        e.preventDefault();
                    }
                }
            });
        });

        // Calendar day selection
        calendarDays.forEach(day => {
            day.addEventListener('click', function() {
                calendarDays.forEach(d => d.classList.remove('selected'));
                this.classList.add('selected');
                
                const date = this.getAttribute('data-date');
                const eventsData = this.getAttribute('data-events');
                const events = eventsData ? JSON.parse(eventsData) : [];
                
                // Show events for the selected date
                showEventsForDate(date, events);
            });
        });
        
        // Close modal
        closeModal.addEventListener('click', function() {
            eventModal.classList.add('hidden');
        });
        
        // Close modal when clicking outside
        eventModal.addEventListener('click', function(e) {
            if (e.target === eventModal) {
                eventModal.classList.add('hidden');
            }
        });
        
        // Function to show events for a specific date
        function showEventsForDate(date, events) {
            const dateObj = new Date(date);
            const formattedDate = dateObj.toLocaleDateString('en-US', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            modalDate.textContent = formattedDate;
            
            if (events.length > 0) {
                let eventsHTML = '<div class="space-y-4">';
                
                events.forEach(event => {
                    const eventDate = new Date(event.event_date);
                    const formattedTime = eventDate.toLocaleTimeString('en-US', { 
                        hour: 'numeric', 
                        minute: '2-digit' 
                    });
                    
                    eventsHTML += `
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-bold text-lg text-dark-800 mb-2">${event.event_name}</h4>
                            <p class="text-dark-600 mb-3">${event.event_description}</p>
                            <div class="flex justify-between items-center text-sm text-dark-500">
                                <span><i class="fas fa-clock mr-1"></i> ${formattedTime}</span>
                                <span><i class="fas fa-map-marker-alt mr-1"></i> ${event.location || 'TBA'}</span>
                            </div>
                            <div class="mt-3 flex justify-between items-center">
                                <span class="text-xl font-bold text-dark-800">₦${parseFloat(event.price || 0).toFixed(2)}</span>
                                <button class="view-event-details bg-primary-500 text-white px-3 py-1 rounded text-sm" data-event-id="${event.id}">
                                    View Details
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                eventsHTML += '</div>';
                modalContent.innerHTML = eventsHTML;
                
                // Add event listeners to view details buttons
                const viewDetailsButtons = modalContent.querySelectorAll('.view-event-details');
                viewDetailsButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const eventId = this.getAttribute('data-event-id');
                        scrollToEvent(eventId);
                        eventModal.classList.add('hidden');
                    });
                });
            } else {
                modalContent.innerHTML = `
                    <div class="text-center py-8">
                        <i class="fas fa-calendar-times text-4xl text-primary-500 mb-4"></i>
                        <p class="text-dark-600">No events scheduled for this date.</p>
                    </div>
                `;
            }
            
            eventModal.classList.remove('hidden');
        }
        
        // Function to scroll to a specific event
        function scrollToEvent(eventId) {
            const eventElement = document.querySelector(`.event-card[data-event-id="${eventId}"]`);
            if (eventElement) {
                eventElement.classList.add('event-highlight');
                eventElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Remove highlight after 3 seconds
                setTimeout(() => {
                    eventElement.classList.remove('event-highlight');
                }, 3000);
            }
        }
        
        // Highlight today's events on page load
        const today = new Date();
        const todayString = today.getFullYear() + '-' + 
                           String(today.getMonth() + 1).padStart(2, '0') + '-' + 
                           String(today.getDate()).padStart(2, '0');
        
        const todayElement = document.querySelector(`.calendar-day[data-date="${todayString}"]`);
        if (todayElement) {
            todayElement.click();
        }
    });
</script>
@endpush