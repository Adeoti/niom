<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile
     */
    public function show()
    {
        $user = Auth::user();
        $membership = $user->membership;
        
        return view('back.profile', compact('user', 'membership'));
    }

    /**
     * Show the form for editing the user's profile
     */
    public function edit()
    {
        $user = Auth::user();
        $membership = $user->membership;
        
        return view('profile.edit', compact('user', 'membership'));
    }

    /**
     * Update the user's profile information
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $membership = $user->membership;

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
        ]);

        // Update user information
        $user->update([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
        ]);

        // Update membership information
        if ($membership) {
            $membership->update([
                'title' => $validated['title'] ?? $membership->title,
                'first_name' => $validated['first_name'],
                'surname' => $validated['last_name'],
                'phone' => $validated['phone'] ?? $membership->phone,
                'date_of_birth' => $validated['date_of_birth'] ?? $membership->date_of_birth,
                'address' => $validated['address'] ?? $membership->address,
                'city' => $validated['city'] ?? $membership->city,
                'state' => $validated['state'] ?? $membership->state,
                'institution' => $validated['institution'] ?? $membership->institution,
                'qualification' => $validated['qualification'] ?? $membership->qualification,
                'biography' => $validated['biography'] ?? $membership->biography,
            ]);
        }

        return redirect()->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the user's password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if current password matches
        if (!Hash::check($validated['current_password'], $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    /**
     * Update the user's profile avatar
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $membership = $user->membership;

        // Delete old avatar if exists
        if ($membership && $membership->passport_path) {
            Storage::delete($membership->passport_path);
        }

        // Store new avatar
        $avatarPath = $request->file('avatar')->store('avatars', 'public');

        // Update membership with new avatar path
        if ($membership) {
            $membership->update([
                'passport_path' => $avatarPath,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Profile picture updated successfully!');
    }
}