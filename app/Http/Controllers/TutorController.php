<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a public listing of available tutors.
     */
    public function index()
    {
        // We want to get all USERS with the role 'tutor'
        // who have a VERIFIED tutor profile
        // and have selected AT LEAST ONE subject.
        $tutors = User::where('role', 'tutor')
            ->whereHas('tutorProfile', function ($query) {
                $query->whereNotNull('verified_at'); // Ensure the profile is verified
            })
            ->whereHas('tutorProfile.subjects') // Ensure they have at least one subject
            ->with(['tutorProfile', 'tutorProfile.subjects']) // Eager load the related data
            ->paginate(9); // Paginate the results to show 9 per page

        return view('tutors.index', compact('tutors'));
    }
    
    /**
     * Display the specified tutor's public profile.
     * Laravel's Route Model Binding automatically finds the User by their ID.
     */
    public function show(User $user)
    {
        // First, ensure the user we are trying to view is actually a tutor.
        // This prevents people from trying to view profiles of students or admins.
        if ($user->role !== 'tutor' || !$user->tutorProfile?->verified_at) {
            abort(404); // Not Found
        }

        // Eager load the necessary relationships for the view
        $user->load(['tutorProfile', 'tutorProfile.subjects']);

        return view('tutors.show', ['tutor' => $user]);
    }
}