<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TutorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     */
    public function create(User $tutor)
    {
        // Ensure we are not trying to book an admin or a non-tutor
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        // Get only the subjects that this specific tutor teaches
        $subjects = $tutor->tutorProfile->subjects;

        return view('booking.create', compact('tutor', 'subjects'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'duration_minutes' => 'required|integer|min:30',
        ]);

        // Combine date and time into a single Carbon datetime object
        $scheduled_at = Carbon::parse($request->date . ' ' . $request->time);

        TutorSession::create([
            'student_id' => Auth::id(),
            'tutor_id' => $request->tutor_id,
            'subject_id' => $request->subject_id,
            'scheduled_at' => $scheduled_at,
            'duration_minutes' => $request->duration_minutes,
            'status' => 'pending', // Default status for a new request
        ]);

        return redirect()->route('dashboard')->with('success', 'Your booking request has been sent to the tutor!');
    }
}