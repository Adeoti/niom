<?php


return [
    'payment_url' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),
    'secret_key'  => env('PAYSTACK_SECRET_KEY'),
    'public_key'  => env('PAYSTACK_PUBLIC_KEY'),
    'paystack_charges_percentage' => env('PAYSTACK_CHARGES_PERCENTAGE', 1.5), // Default to 1.5%
    'paystack_charges_flat' => env('PAYSTACK_CHARGES_FLAT', 100), // Default to 100 NGN
    'paramount_charges_flat' => env('PARAMOUNT_CHARGES_FLAT', 500), // Default to 500 NGN
];
