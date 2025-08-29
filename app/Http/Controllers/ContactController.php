<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactFormMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Please correct the errors in the form.'
            ], 422);
        }

        try {
            // Send email
            // Mail::to(config('mail.admin_address', 'admin@niotim.org'))
            //     ->send(new ContactFormMessage($request->all()));

            // Optionally store in database if needed
            ContactMessage::create($request->all());

            return response()->json([
                'message' => 'Your message has been sent successfully! We will get back to you soon.'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());

            return response()->json([
                'message' => 'An error occurred while sending your message. Please try again later.'
            ], 500);
        }
    }
}
