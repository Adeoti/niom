<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{

    public function index()
    {
        $members = Membership::with(['user', 'rank:id,name,level'])

            ->where('status', 'approved')
            ->latest()
            ->paginate(10);

        Log::info('Members with ranks:', $members->toArray());


        $stats = [
            'total' => Membership::where('status', 'approved')->count(),
            'students' => Membership::where('status', 'approved')
                ->where(function ($query) {
                    $query->where('type', 'student-hnd')
                        ->orWhere('type', 'university-student');
                })->count(),
            'lecturers' => Membership::where('status', 'approved')
                ->where(function ($query) {
                    $query->where('type', 'polytechnic-lecturer')
                        ->orWhere('type', 'university-lecturer');
                })->count(),
            'professionals' => Membership::where('status', 'approved')
                ->where('type', 'professional')->count(),
        ];

        return view('front.members.index', compact('members', 'stats'));
    }


    public function checkout(Request $request)
    {
        $applicationId = $request->query('application_id');

        if (!$applicationId) {
            return redirect()->route('membership.create')->with('error', 'Application ID is required for checkout.');
        }

        $membership = Membership::with('user')->find($applicationId);

        if (!$membership) {
            return redirect()->route('membership.create')->with('error', 'Invalid Application ID.');
        }

        if ($membership->status !== 'pending') {
            return redirect()->route('membership.create')->with('error', 'This application has already been processed.');
        }

        // Here you would typically generate a payment link using your payment gateway
        // For demonstration, we'll use a placeholder link
        $paymentLink = 'https://payment-gateway.example.com/pay?amount=100&reference=' . $membership->id;


        // Get the payment details
        $payment = Payment::where('is_active', true)->where('type', 'application_fee')->first();

        return view('front.form.checkout', compact('membership', 'paymentLink', 'payment'));
    }
    // public function index()
    // {
    //     $members = Membership::with(['user', 'membershipRank'])->where('status', 'approved')->latest()->paginate(10);


    //     Log::info($members);
    //     $stats = [
    //         'total' => Membership::where('status', 'approved')->count(),
    //         'students' => Membership::where('status', 'approved')->where('type', 'student-hnd')->orWhere('type', 'university-student')->count(),
    //         'lecturers' => Membership::where('status', 'approved')->where('type', 'polytechnic-lecturer')->orWhere('type', 'university-lecturer')->count(),
    //         'professionals' => Membership::where('status', 'approved')->where('type', 'professional')->count(),
    //     ];
    //     return view('front.members.index', compact('members', 'stats'));
    // }
    public function create(Request $request)
    {
        return view('front.form.application');
    }


    public function apply(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:20',
            'membership_type' => 'required|in:student-hnd,university-student,polytechnic-lecturer,university-lecturer,professional',
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string',
            'institution' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'passport' => 'required|image|max:1024', // 1MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Please correct the errors in the form.'
            ], 422);
        }

        // Create user and membership in a transaction
        try {
            $membershipId = null; // Store just the ID

            DB::transaction(function () use ($request, &$membershipId) {
                // Create user
                $user = User::create([
                    'name' => $request->first_name . ' ' . $request->surname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password), // Generate random password
                    'role' => 'applicant', // Set role to applicant initially
                ]);

                // Handle passport upload
                $passportPath = null;
                if ($request->hasFile('passport')) {
                    $passportPath = $request->file('passport')->store('passports', 'public');
                }

                // Create membership
                $membership = Membership::create([
                    'user_id' => $user->id,
                    'title' => $request->title,
                    'type' => $request->membership_type,
                    'surname' => $request->surname,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'date_of_birth' => $request->dob,
                    'nationality' => $request->nationality,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'passport_path' => $passportPath,
                    'institution' => $request->institution,
                    'qualification' => $request->qualification,
                    'status' => 'pending',
                    'application_date' => now(),
                ]);

                $membershipId = $membership->id;

                // Send confirmation email
                // Mail::to($user->email)->send(new MembershipApplicationReceived($user));
            });

            if (!$membershipId) {
                throw new \Exception('Failed to create membership');
            }

            return response()->json([
                'message' => 'Your application has been submitted successfully! We will review it and get back to you soon.',
                'application_id' => $membershipId

            ], 200);
        } catch (\Exception $e) {
            Log::error('Membership application error: ' . $e->getMessage());

            return response()->json([
                'message' => 'An error occurred while processing your application. Please try again later.'
            ], 500);
        }
    }
}
