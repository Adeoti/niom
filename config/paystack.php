<?php


return [
    'payment_url' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),
    'secret_key'  => env('PAYSTACK_SECRET_KEY'),
    'public_key'  => env('PAYSTACK_PUBLIC_KEY'),
];
