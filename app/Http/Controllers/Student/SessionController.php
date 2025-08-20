<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TutorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the student's booked sessions.
     */
    public function index()
    {
        // Get all sessions where the logged-in user is the student
        $sessions = TutorSession::where('student_id', Auth::id())
            ->with(['tutor', 'subject']) // Eager load tutor and subject details
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('student.sessions.index', compact('sessions'));
    }
}