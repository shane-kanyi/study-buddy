<?php

namespace App\Http\Controllers;

use App\Models\TutorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorApplicationController extends Controller
{
    /**
     * Show the form for creating a new tutor application.
     */
    public function create()
    {
        return view('tutor.apply');
    }

    /**
     * Store a newly created tutor application in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|min:50',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();

        // Prevent creating duplicate profiles
        if ($user->tutorProfile) {
            return redirect()->route('dashboard')->with('error', 'You have already submitted an application.');
        }

        TutorProfile::create([
            'user_id' => $user->id,
            'bio' => $request->bio,
            'hourly_rate' => $request->hourly_rate,
        ]);

        return redirect()->route('dashboard')->with('success', 'Your application has been submitted and is pending review.');
    }
}