<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorProfile;
use App\Models\User;
use Illuminate\Http\Request;

class TutorManagementController extends Controller
{
    /**
     * Display a listing of all tutor applications.
     */
    public function index()
    {
        // Eager load the user information to avoid N+1 query problems
        $tutorProfiles = TutorProfile::with('user')->orderBy('created_at', 'desc')->get();

        return view('admin.tutors.index', compact('tutorProfiles'));
    }

    /**
     * Verify a tutor's application.
     */
    public function verify(TutorProfile $tutorProfile)
    {
        $user = $tutorProfile->user;

        // Check if the profile is already verified
        if ($tutorProfile->verified_at) {
            // It's already verified, so let's un-verify them
            $tutorProfile->update(['verified_at' => null]);
            if ($user->role === 'tutor') {
                $user->update(['role' => 'student']);
            }
            $message = 'Tutor has been un-verified and their role set to student.';
        } else {
            // Verify the tutor
            $tutorProfile->update(['verified_at' => now()]);
            if ($user->role !== 'admin') { // Don't demote an admin
                $user->update(['role' => 'tutor']);
            }
            $message = 'Tutor has been verified successfully.';
        }

        return redirect()->route('admin.tutors.index')->with('success', $message);
    }
}