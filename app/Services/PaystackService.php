<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class PaystackService
{
    protected $baseUrl;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUrl = Config::get('paystack.payment_url', 'https://api.paystack.co');
        $this->secretKey = Config::get('paystack.secret_key');
    }

    /**
     * Initialize a transaction with Paystack
     */
    public function initializeTransaction(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache'
            ])->post($this->baseUrl . '/transaction/initialize', $data);

            $result = $response->json();

            if (!$response->successful() || !$result['status']) {
                Log::error('Paystack initialization failed: ', $result);
                return [
                    'success' => false,
                    'message' => $result['message'] ?? 'Failed to initialize transaction'
                ];
            }

            return [
                'success' => true,
                'data' => $result['data']
            ];

        } catch (\Exception $e) {
            Log::error('Paystack initialization error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to initialize payment. Please try again.'
            ];
        }
    }

    /**
     * Verify a transaction with Paystack
     */
    public function verifyTransaction($reference)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache'
            ])->get($this->baseUrl . '/transaction/verify/' . $reference);

            $result = $response->json();

            if (!$response->successful() || !$result['status']) {
                Log::error('Paystack verification failed: ', $result);
                return [
                    'success' => false,
                    'message' => $result['message'] ?? 'Failed to verify transaction'
                ];
            }

            return [
                'success' => true,
                'data' => $result['data']
            ];

        } catch (\Exception $e) {
            Log::error('Paystack verification error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to verify payment. Please try again.'
            ];
        }
    }

    /**
     * List transactions (optional - for admin purposes)
     */
    public function listTransactions($params = [])
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->get($this->baseUrl . '/transaction', $params);

            $result = $response->json();

            if (!$response->successful() || !$result['status']) {
                Log::error('Paystack list transactions failed: ', $result);
                return [
                    'success' => false,
                    'message' => $result['message'] ?? 'Failed to fetch transactions'
                ];
            }

            return [
                'success' => true,
                'data' => $result['data']
            ];

        } catch (\Exception $e) {
            Log::error('Paystack list transactions error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to fetch transactions.'
            ];
        }
    }

    /**
     * Check transaction status
     */
    public function checkTransactionStatus($reference)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->get($this->baseUrl . '/transaction/check/' . $reference);

            $result = $response->json();

            if (!$response->successful() || !$result['status']) {
                Log::error('Paystack check status failed: ', $result);
                return [
                    'success' => false,
                    'message' => $result['message'] ?? 'Failed to check transaction status'
                ];
            }

            return [
                'success' => true,
                'data' => $result['data']
            ];

        } catch (\Exception $e) {
            Log::error('Paystack check status error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to check transaction status.'
            ];
        }
    }
}