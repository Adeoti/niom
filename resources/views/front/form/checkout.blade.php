<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Checkout - NIOTIM</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9f4',
                            100: '#dbf0e3',
                            500: '#0a914c',
                            600: '#087d42',
                            700: '#066937',
                            800: '#05552d',
                            900: '#044223',
                        },
                        secondary: {
                            50: '#fbfce9',
                            100: '#f5f8c9',
                            500: '#d2d925',
                            600: '#bcc321',
                            700: '#a6ad1d',
                            800: '#909719',
                            900: '#7a8115',
                        },
                        accent: {
                            50: '#fefef8',
                            100: '#fdfcec',
                            500: '#f3f4c8',
                            600: '#dbdcb4',
                            700: '#c3c4a0',
                        },
                        dark: {
                            50: '#f5f5f5',
                            100: '#e9e9e9',
                            500: '#333333',
                            600: '#2e2e2e',
                            700: '#292929',
                            800: '#242424',
                            900: '#1f1f1f',
                        }
                    },
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        
        .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.2);
        }
        
        .card-element {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            background: white;
        }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Header Navigation -->
    <header class="fixed w-full z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-xl mr-3 shadow-md">N</div>
                <span class="text-xl font-bold text-primary-500">NIOTIM</span>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="{{route('home')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Home</a></li>
                    <li><a href="{{route('home')}}#about" class="text-dark-500 hover:text-primary-500 transition font-medium">About</a></li>
                    <li><a href="{{route('home')}}#membership" class="text-dark-500 hover:text-primary-500 transition font-medium">Membership</a></li>
                    <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Application</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Checkout Section -->
    <section class="pt-32 pb-16 bg-primary-50 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Progress Bar -->
                    <div class="bg-primary-500 text-white p-6 text-center">
                        <h2 class="text-2xl font-bold mb-2">Complete Your Membership Application</h2>
                        <p class="opacity-90">Final step: Make your payment</p>
                        <div class="w-24 h-2 bg-primary-300 rounded-full mx-auto mt-4">
                            <div class="h-full bg-secondary-500 rounded-full w-full"></div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Order Summary -->
                            <div>
                                <h3 class="text-xl font-semibold text-primary-500 mb-6">Order Summary</h3>
                                
                                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-dark-600">Membership Type:</span>
                                        <span class="font-semibold" id="summary-membership-type">Professional Membership</span>
                                    </div>
                                    
                                    {{-- <div class="flex justify-between items-center mb-4">
                                        <span class="text-dark-600">Application Fee:</span>
                                        <span class="font-semibold">₦ 2,000.00</span>
                                    </div> --}}
                                    
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-dark-600">Membership Fee:</span>
                                        <span class="font-semibold" id="summary-membership-feei">₦ {{number_format($payment->amount,2)}}</span>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-4 mt-2">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold">Total:</span>
                                            <span class="text-xl font-bold text-primary-500" id="summary-totali">₦ {{number_format($payment->amount,2)}}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-accent-50 rounded-lg p-4 mb-6">
                                    <div class="flex items-start">
                                        <div class="mr-3 mt-1 text-primary-500">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <p class="text-sm text-dark-600">
                                            Your membership will be activated once your details and payment are comfirmed. 
                                            You'll receive a confirmation email with your membership details.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Form -->
                            <div>
                                <h3 class="text-xl font-semibold text-primary-500 mb-6">Proceed to pay</h3>

                                <form id="payment-form" action="{{ route('payment.initialize', $payment) }}" method="POST">
                                    @csrf
                                    {{-- <div class="mb-6">
                                        <label class="block text-dark-700 font-medium mb-2">Card Number</label>
                                        <div class="card-element" id="card-number-element">
                                            <!-- Stripe Card Number Element will be inserted here -->
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div>
                                            <label class="block text-dark-700 font-medium mb-2">Expiry Date</label>
                                            <div class="card-element" id="card-expiry-element">
                                                <!-- Stripe Expiry Element will be inserted here -->
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-dark-700 font-medium mb-2">CVC</label>
                                            <div class="card-element" id="card-cvc-element">
                                                <!-- Stripe CVC Element will be inserted here -->
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <div class="mb-6">
                                        <label class="block text-dark-700 font-medium mb-2">Name on Card</label>
                                        <input type="text" class="form-input" placeholder="John Doe" id="cardholder-name">
                                    </div> --}}
                                    
                                    <div id="card-errors" class="text-red-500 mb-6" role="alert"></div>
                                    
                                    <button type="submit" id="submit-payment" class="w-full bg-primary-500 text-white py-3 rounded-lg font-semibold hover:bg-primary-600 transition flex items-center justify-center">
                                        <span>Pay Now</span>
                                        <span id="payment-spinner" class="ml-2 hidden">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </span>
                                    </button>
                                    
                                    <p class="text-center text-sm text-dark-400 mt-4">
                                        Your payment is secure and encrypted. We never store your card details.
                                    </p>
                                </form>
                                
                                <!-- Alternative Payment Methods -->
                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <p class="text-center text-dark-600 mb-4">Or pay with</p>
                                    <div class="grid grid-cols-1 gap-4">
                                        {{-- <button class="bg-gray-100 text-dark-600 py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                                            <i class="fab fa-paypal mr-2"></i> PayPal
                                        </button> --}}
                                        <button class="bg-gray-100 text-dark-600 py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                                            <i class="fas fa-university mr-2"></i> Bank Transfer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center text-sm text-gray-600 bg-gray-100">
        <p>Designed by <a href="https://wa.link/1tz78w" class="font-semibold text-primary-500">Paramount Computer</a></p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get application ID from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const applicationId = urlParams.get('application_id');
            
            // In a real implementation, you would fetch payment details from your server
            // For now, we'll use dummy data
            const membershipTypes = {
                'student-hnd': { name: 'OTM Student (HND)', fee: 5000 },
                'university-student': { name: 'University Student', fee: 7000 },
                'polytechnic-lecturer': { name: 'Polytechnic Lecturer', fee: 15000 },
                'university-lecturer': { name: 'University Lecturer', fee: 20000 },
                'professional': { name: 'Professional', fee: 25000 }
            };
            
            // Set a default membership type
            let membershipType = 'professional';
            let membershipName = membershipTypes[membershipType].name;
            let membershipFee = membershipTypes[membershipType].fee;
            const applicationFee = 2000;
            const totalAmount = membershipFee + applicationFee;
            
            // Update the summary with the fetched data
            document.getElementById('summary-membership-type').textContent = membershipName;
            document.getElementById('summary-membership-fee').textContent = `₦ ${membershipFee.toLocaleString()}.00`;
            document.getElementById('summary-total').textContent = `₦ ${totalAmount.toLocaleString()}.00`;
            
            // In a real implementation, you would initialize Stripe with your public key
            // For demonstration, we'll just simulate the payment process
            
            const form = document.getElementById('payment-form');
            const submitButton = document.getElementById('submit-payment');
            const paymentSpinner = document.getElementById('payment-spinner');
            
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Show loading state
                submitButton.disabled = true;
                paymentSpinner.classList.remove('hidden');
                
                // Validate form
                const cardholderName = document.getElementById('cardholder-name').value;
                if (!cardholderName) {
                    document.getElementById('card-errors').textContent = 'Please enter the name on your card';
                    submitButton.disabled = false;
                    paymentSpinner.classList.add('hidden');
                    return;
                }
                
                // Simulate payment processing
                try {
                    // In a real implementation, you would create a payment intent with Stripe
                    // For now, we'll simulate a successful payment after a short delay
                    await new Promise(resolve => setTimeout(resolve, 2000));
                    
                    // Simulate successful payment
                    alert('Payment successful! Your membership application is now complete.');
                    
                    // Redirect to a success page (you would change this to your actual success page)
                    window.location.href = '/membership/success';
                    
                } catch (error) {
                    document.getElementById('card-errors').textContent = 'Payment failed. Please try again.';
                    submitButton.disabled = false;
                    paymentSpinner.classList.add('hidden');
                }
            });
            
            // If application ID is present, fetch the actual membership details
            if (applicationId) {
                // In a real implementation, you would fetch from your API
                // fetch(`/api/membership-application/${applicationId}/payment-details`)
                //   .then(response => response.json())
                //   .then(data => {
                //       // Update the UI with the actual data
                //   });
                
                console.log('Fetching payment details for application:', applicationId);
            }
        });
    </script>
</body>
</html>