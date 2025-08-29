@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-dark-800">Payment Details</h1>
            <p class="text-dark-500">Details for payment #PAY-{{ $payment->id }}</p>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('payment.history.index') }}" class="text-primary-500 hover:underline">
                <i class="fas fa-arrow-left mr-1"></i> Back to History
            </a>
        </div>
    </header>

    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-4">Payment Information</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-dark-500">Payment ID:</span>
                        <span class="font-medium">#PAY-{{ $payment->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-dark-500">Description:</span>
                        <span class="font-medium">{{ $payment->payment->label ?? 'Payment' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-dark-500">Date:</span>
                        <span class="font-medium">{{ $payment->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-dark-500">Payment Method:</span>
                        <span class="font-medium">{{ ucfirst($payment->payment_method) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-dark-500">Status:</span>
                        <span class="font-medium">
                            <span class="status-badge 
                                @if($payment->status === 'completed') status-completed
                                @elseif($payment->status === 'pending') status-pending
                                @else status-failed
                                @endif">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-lg font-semibold mb-4">Amount Details</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-dark-500">Amount:</span>
                        <span class="font-medium text-xl text-primary-500">₦{{ number_format($payment->amount, 2) }}</span>
                    </div>
                    @if($payment->payment)
                    <div class="flex justify-between">
                        <span class="text-dark-500">Payment Type:</span>
                        <span class="font-medium">{{ ucfirst($payment->payment->type) }}</span>
                    </div>
                    @endif
                </div>
                
                @if($payment->api_response)
                <div class="mt-6">
                    <h2 class="text-lg font-semibold mb-2">Transaction Reference</h2>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <code class="text-sm break-all">{{ json_decode($payment->api_response)->reference ?? 'N/A' }}</code>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- @if($payment->api_response)
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Raw Response Data</h2>
        <div class="bg-gray-50 p-3 rounded-lg overflow-x-auto">
            <pre class="text-sm">{{ json_encode(json_decode($payment->api_response), JSON_PRETTY_PRINT) }}</pre>
        </div>
    </div>
    @endif --}}
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
</style>
@endpush