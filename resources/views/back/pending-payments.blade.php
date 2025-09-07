@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-dark-800">Pending Payments</h1>
            <p class="text-dark-500">Review and complete your outstanding payments</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <i class="fas fa-bell text-dark-400 text-xl"></i>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">{{ count($pendingPayments) }}</span>
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
                    <p class="text-dark-500">Pending Payments</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['pending_count'] }}</h3>
                </div>
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-clock text-primary-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Awaiting completion</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Total Due</p>
                    <h3 class="text-2xl font-bold text-primary-500">₦{{ number_format($stats['total_due'], 2) }}</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-yellow-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Outstanding balance</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Overdue</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['overdue_count'] }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Past due date</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Due Soon</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['due_soon_count'] }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-hourglass-half text-blue-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Within 7 days</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h3 class="font-semibold text-dark-800">Pending Payments</h3>
            <p class="text-dark-500 text-sm">Filter and manage your outstanding payments</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-3">
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Types</option>
                    <option>Membership Dues</option>
                    <option>Event Registration</option>
                    <option>Workshop Fees</option>
                    <option>Certification</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Status</option>
                    <option>Pending</option>
                    <option>Overdue</option>
                    <option>Due Soon</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-500"></i>
                </div>
                <input type="text" class="bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" placeholder="Search payments...">
            </div>
        </div>
    </div>

    <!-- Pending Payments List -->
    <div class="space-y-4">
        @forelse($pendingPayments as $item)
        @php
            $payment = $item['payment'];
            $dueStatus = $item['due_status'];
        @endphp
        <div class="payment-card">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-lg text-dark-800">{{ $payment->label }}</h3>
                        <span class="status-badge 
                            @if($dueStatus === 'overdue') status-overdue 
                            @elseif($dueStatus === 'due_soon') status-pending
                            @else status-pending @endif">
                            @if($dueStatus === 'overdue') Overdue
                            @elseif($dueStatus === 'due_soon') Due Soon
                            @else Pending
                            @endif
                        </span>
                    </div>
                    <p class="text-dark-600 mb-2">{{ $payment->description ?? 'Payment required' }}</p>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                        <span><i class="fas fa-calendar-alt mr-1"></i> Created: {{ $payment->created_at->format('M d, Y') }}</span>
                        <span><i class="fas fa-tag mr-1"></i> {{ ucfirst($payment->type) }}</span>
                        <span><i class="fas fa-file-invoice mr-1"></i> #PAY-{{ $payment->id }}</span>
                    </div>
                </div>
                <div class="flex flex-col items-end">
                    <p class="text-2xl font-bold text-dark-800 mb-2">₦{{ number_format($payment->amount, 2) }}</p>
                    @php
                        $total_amount = $payment->amount;
                        // Add Paystack charges
                        $percentageCharge = config('paystack.paystack_charges_percentage', 1.5);
                        $flatCharge = config('paystack.paystack_charges_flat', 100);
                        $paramountCharge = config('paystack.paramount_charges_flat', 500);
                        $transaction_fee = ($payment->amount * $percentageCharge / 100) + $flatCharge + $paramountCharge;
                        $total_amount += $transaction_fee;

                    @endphp

                    <p class="text-sm text-dark-500 bg-red-100/50 py-2 px-4 rounded-3xl my-2">+Transaction Fee: ₦{{ number_format($transaction_fee, 2) }}</p>
                    <p class="text-sm text-dark-500 bg-red-100/50 py-2 px-4 rounded-3xl mb-1.5 font-medium">Total: ₦{{ number_format($total_amount, 2) }}</p>
                    <form action="{{ route('payment.initialize', $payment) }}" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $payment->amount }}">
                        <input type="hidden" name="payment_method" value="online">
                        <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                            {{-- Pay <span class="font-bold bg-amber-200 px-2 py-1 rounded-full text-black">₦ {{ number_format($total_amount, 2) }}</span> now --}}
                            Pay now
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="payment-card text-center py-8">
            <i class="fas fa-check-circle text-4xl text-primary-500 mb-4"></i>
            <h3 class="text-xl font-bold text-dark-800 mb-2">No Pending Payments</h3>
            <p class="text-dark-500">You're all caught up with your payments!</p>
        </div>
        @endforelse
    </div>
    
    <!-- Payment Summary -->
    @if(count($pendingPayments) > 0)
    <div class="mt-8 bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-dark-800 mb-4">Payment Summary</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="font-semibold text-dark-700 mb-3">Payment Distribution</h3>
                <div class="space-y-4">
                    @php
                        $paymentTypes = [];
                        foreach ($pendingPayments as $item) {
                            $type = $item['payment']->type;
                            if (!isset($paymentTypes[$type])) {
                                $paymentTypes[$type] = 0;
                            }
                            $paymentTypes[$type] += $item['payment']->amount;
                        }
                        
                        $maxAmount = max($paymentTypes);
                    @endphp
                    
                    @foreach($paymentTypes as $type => $amount)
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-dark-600">{{ ucfirst($type) }}</span>
                            <span class="text-dark-800 font-medium">₦{{ number_format($amount, 2) }}</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ ($amount / $maxAmount) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div>
                <h3 class="font-semibold text-dark-700 mb-3">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                        <i class="fas fa-credit-card mr-2"></i>
                        <span>Pay All Outstanding</span>
                    </button>
                    <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                        <i class="fas fa-file-invoice-dollar mr-2"></i>
                        <span>Request Payment Plan</span>
                    </button>
                    <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                        <i class="fas fa-download mr-2"></i>
                        <span>Download Statements</span>
                    </button>
                </div>
            </div>
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
    
    .status-pending {
        background-color: #fef6e6;
        color: #f5a623;
    }
    
    .status-overdue {
        background-color: #fee6e6;
        color: #e53e3e;
    }
    
    .filter-bar {
        background: white;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }
    
    .payment-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .payment-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .progress-bar {
        height: 8px;
        border-radius: 4px;
        background-color: #e5e7eb;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        background-color: #0a914c;
        border-radius: 4px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Payment button handlers
    const payButtons = document.querySelectorAll('.btn-primary');
    payButtons.forEach(button => {
        button.addEventListener('click', function() {
            const paymentCard = this.closest('.payment-card');
            const paymentTitle = paymentCard.querySelector('h3').textContent;
            
            // Show a confirmation dialog
            if (confirm(`Are you sure you want to pay for: ${paymentTitle}?`)) {
                // The form will submit normally
            } else {
                event.preventDefault();
            }
        });
    });
</script>
@endpush