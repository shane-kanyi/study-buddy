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
}