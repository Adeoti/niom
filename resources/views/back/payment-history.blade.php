@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-dark-800">Payment History</h1>
            <p class="text-dark-500">View your past transactions and payment records</p>
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
                    <p class="text-dark-500">Total Payments</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['total_payments'] }}</h3>
                </div>
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-credit-card text-primary-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">All-time transactions</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Total Amount</p>
                    <h3 class="text-2xl font-bold text-primary-500">₦{{ number_format($stats['total_amount'], 2) }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-coins text-green-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">All payments combined</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Successful</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['successful'] }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Completed payments</p>
        </div>
        
        <div class="stats-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-dark-500">Failed</p>
                    <h3 class="text-2xl font-bold text-primary-500">{{ $stats['failed'] }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-times-circle text-red-500 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-dark-400 mt-2">Unsuccessful attempts</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h3 class="font-semibold text-dark-800">Transaction History</h3>
            <p class="text-dark-500 text-sm">Filter and search your payment records</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-3">
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Status</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Failed</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            
            <div class="relative">
                <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                    <option selected>All Time</option>
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>Last 3 Months</option>
                    <option>2023</option>
                    <option>2022</option>
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

    <!-- Payment History List -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-dark-500">
                <thead class="text-xs text-dark-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Payment ID</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Method</th>
                        <th scope="col" class="px-6 py-3">Amount</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-dark-900">#PAY-{{ $payment->id }}</td>
                        <td class="px-6 py-4">{{ $payment->payment->label ?? 'Payment' }}</td>
                        <td class="px-6 py-4">{{ $payment->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">{{ ucfirst($payment->payment_method) }}</td>
                        <td class="px-6 py-4">₦{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="status-badge 
                                @if($payment->status === 'completed') status-completed
                                @elseif($payment->status === 'pending') status-pending
                                @else status-failed
                                @endif">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('payment.history.show', $payment->id) }}" class="text-primary-500 hover:underline">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-dark-500">
                            No payment history found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($payments->hasPages())
        <div class="flex items-center justify-between p-4 border-t">
            <div>
                <p class="text-sm text-dark-700">
                    Showing <span class="font-medium">{{ $payments->firstItem() }}</span> to <span class="font-medium">{{ $payments->lastItem() }}</span> of <span class="font-medium">{{ $payments->total() }}</span> results
                </p>
            </div>
            <div class="flex space-x-2">
                @if($payments->onFirstPage())
                <span class="flex items-center px-4 py-2 text-sm font-medium text-dark-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                    Previous
                </span>
                @else
                <a href="{{ $payments->previousPageUrl() }}" class="flex items-center px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Previous
                </a>
                @endif

                @foreach($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                    @if($page == $payments->currentPage())
                    <span class="px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-primary-500 rounded-lg">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        {{ $page }}
                    </a>
                    @endif
                @endforeach

                @if($payments->hasMorePages())
                <a href="{{ $payments->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
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
    </div>
    
    <!-- Download Section -->
    <div class="mt-8 bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-dark-800 mb-4">Download Records</h2>
        <p class="text-dark-500 mb-6">Download your payment history for record keeping or accounting purposes.</p>
        
        <div class="flex flex-col md:flex-row gap-4">
            <a href="{{ route('payment.history.download', 'pdf') }}" class="flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                <i class="fas fa-file-pdf text-xl mr-2"></i>
                <span>Download as PDF</span>
            </a>
            
            <a href="{{ route('payment.history.download', 'csv') }}" class="flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                <i class="fas fa-file-csv text-xl mr-2"></i>
                <span>Download as CSV</span>
            </a>
            
            <button onclick="window.print()" class="flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                <i class="fas fa-print text-xl mr-2"></i>
                <span>Print Records</span>
            </button>
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

@push('styles')
<style>
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-completed {
        background-color: #f0f9f4;
        color: #0a914c;
    }
    
    .status-pending {
        background-color: #fef6e6;
        color: #f5a623;
    }
    
    .status-failed {
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
</style>
@endpush