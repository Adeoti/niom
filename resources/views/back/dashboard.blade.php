@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-dark-800">Member Dashboard</h1>
            <p class="text-dark-500">Welcome back, {{ $membership->first_name }}! Here's your activity summary.</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <i class="fas fa-bell text-dark-400 text-xl"></i>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
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
                    <p class="text-dark-500">Membership Status</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ ucfirst($membership->status) }}</h3>
                </div>
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-primary-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">
                @if($membership->approval_date)
                    Approved: {{ $membership->approval_date->format('m/d/Y') }}
                @else
                    Application pending approval
                @endif
            </p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Pending Payments</p>
                    <h3 class="text-2xl font-bold text-primary-500">₦{{ number_format($pendingAmount, 2) }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">{{ count($pendingPayments) }} invoice(s) pending</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Upcoming Events</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ count($upcomingEvents) }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-alt text-blue-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">
                @if(count($upcomingEvents) > 0)
                    Next: {{ $upcomingEvents->first()->event_name }}
                @else
                    No upcoming events
                @endif
            </p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Member Since</p>
                    <h3 class="text-2xl font-bold text-primary-500">
                        @if($membership->approval_date)
                            {{ $membership->approval_date->format('Y') }}
                        @else
                            <span class="text-gray-600 text-sm">Not yet approved!</span>
                        @endif
                    </h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-award text-green-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">
                {{ $memberSince }}
            </p>
        </div>
    </section>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column -->
        <div>
            <!-- Upcoming Events -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-dark-800">Upcoming Events</h2>
                    <a href="{{ route('events.index') }}" class="text-primary-500 text-sm">View All</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($upcomingEvents as $event)
                    <div class="event-item">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold">{{ $event->event_name }}</h3>
                                <p class="text-dark-500 text-sm">{{ $event->event_description }}</p>
                            </div>
                            <span class="bg-primary-100 text-primary-500 text-xs px-2 py-1 rounded-full">
                                {{ Carbon\Carbon::parse($event->event_date)->format('M d') }}
                            </span>
                        </div>
                        <div class="flex items-center text-dark-400 text-sm mt-2">
                            <i class="far fa-clock mr-2"></i>
                            <span>{{ Carbon\Carbon::parse($event->event_date)->format('g:i A') }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-dark-500">
                        No upcoming events
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Pending Payments -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-dark-800">Pending Payments</h2>
                    <a href="{{ route('pending.payments.index') }}" class="text-primary-500 text-sm">View All</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($pendingPayments as $payment)
                    <div class="payment-item">
                        <div>
                            <h3 class="font-semibold">{{ $payment->label }}</h3>
                            <p class="text-dark-500 text-sm">Type: {{ ucfirst($payment->type) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-red-500">₦{{ number_format($payment->amount, 2) }}</p>
                            <button class="btn-primary text-white text-xs px-3 py-1 rounded-full mt-2">Pay Now</button>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-dark-500">
                        No pending payments
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Right Column -->
        <div>
            <!-- Profile Summary -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-dark-800">Profile Summary</h2>
                    <a href="{{ route('profile.show') }}" class="text-primary-500 text-sm">Edit Profile</a>
                </div>
                
                <div class="profile-header p-4 rounded-lg mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center">
                            <span class="text-primary-500 font-bold text-xl">
                                {{ substr($membership->first_name, 0, 1) }}{{ substr($membership->surname, 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <h3 class="font-semibold">{{ $membership->first_name }} {{ $membership->surname }}</h3>
                            <p class="text-accent-300">{{ $membership->rank->name ?? 'Member' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-dark-500 text-sm">Email</p>
                        <p class="font-medium">{{ Auth::user()->email }}</p>
                    </div>
                    
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-dark-500 text-sm">Phone</p>
                        <p class="font-medium">{{ $membership->phone ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-dark-500 text-sm">Membership ID</p>
                        <p class="font-medium">NIOTIM-{{ $membership->id }}</p>
                    </div>
                    
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-dark-500 text-sm">Member Since</p>
                        <p class="font-medium">
                            @if($membership->approval_date)
                                {{ $membership->approval_date->format('F Y') }}
                            @else
                                <span class="text-gray-600">Not yet approved!</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-dark-800 mb-6">Quick Actions</h2>
                
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <span class="text-sm font-medium">Register for Event</span>
                    </a>
                    
                    <a href="{{ route('payment.history.index') }}" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <span class="text-sm font-medium">View Invoices</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-download"></i>
                        </div>
                        <span class="text-sm font-medium">Download ID Card</span>
                    </a>
                    
                    <a href="{{ route('membership.index') }}" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="text-sm font-medium">Member Directory</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
     
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