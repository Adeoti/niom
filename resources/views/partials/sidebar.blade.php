<aside class="sidebar" id="sidebar">
    <div class="p-5">
        <div class="flex items-center space-x-3 mb-8">
            <div class="w-12 h-12 rounded-full bg-white text-primary-500 flex items-center justify-center font-bold text-xl shadow-md">
                <img src="{{ asset('images/niotim-logo.jpeg') }}" alt="" class="h-10 w-10 rounded-full">
            </div>
            <div>
                <h2 class="font-semibold">NIOTIM</h2>
                <p class="text-accent-500 text-sm">Member Portal</p>
            </div>
        </div>
        
        <div class="mb-8">
            <div class="flex items-center space-x-3 bg-primary-800 p-3 rounded-lg">
                <div class="w-14 h-14 rounded-full bg-accent-500 flex items-center justify-center">
                    <span class="text-primary-500 font-bold text-xl">
                        {{ substr($membership->first_name, 0, 1) }}{{ substr($membership->surname, 0, 1) }}
                    </span>
                </div>
                <div>
                    <h3 class="font-semibold">{{ $membership->first_name }} {{ $membership->surname }}</h3>
                    <p class="text-accent-300 text-sm">{{ $membership->rank->name ?? 'Member' }}</p>
                </div>
            </div>
        </div>
        
        <nav class="flex-1">
            <a href="{{ route('dashboard') }}" class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('payment.history.index') }}" class="nav-item {{ Request::is('payment-history') ? 'active' : '' }}">
                <i class="fas fa-credit-card"></i>
                <span>Payment History</span>
            </a>
            <a href="{{ route('pending.payments.index') }}" class="nav-item {{ Request::is('pending-payments') ? 'active' : '' }}">
                <i class="fas fa-clock"></i>
                <span>Pending Payments</span>
            </a>
            <a href="{{ route('events.index') }}" class="nav-item {{ Request::is('events') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <a href="{{ route('profile.show') }}" class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>
        
        <div class="mt-auto pt-4 border-t border-primary-700">
            <a href="{{ route('logout') }}" class="nav-item text-accent-300 hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</aside>