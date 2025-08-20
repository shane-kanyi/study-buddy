<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\TutorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the tutor's sessions.
     */
    public function index()
    {
        $sessions = TutorSession::where('tutor_id', Auth::id())
            ->with(['student', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('tutor.sessions.index', compact('sessions'));
    }

    /**
     * Confirm a pending session request.
     */
    public function confirm(TutorSession $tutorSession)
    {
        // Authorization: Ensure the logged-in user is the tutor for this session
        $this->authorizeTutor($tutorSession);

        $tutorSession->update(['status' => 'confirmed']);

        return redirect()->route('tutor.sessions.index')->with('success', 'Session confirmed successfully.');
    }

    /**
     * Cancel a pending or confirmed session.
     */
    public function cancel(TutorSession $tutorSession)
    {
        $this->authorizeTutor($tutorSession);

        $tutorSession->update(['status' => 'cancelled']);

        return redirect()->route('tutor.sessions.index')->with('success', 'Session has been cancelled.');
    }

    /**
     * Helper function for authorization.
     */
    private function authorizeTutor(TutorSession $tutorSession)
    {
        if ($tutorSession->tutor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}