<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the tutor's profile.
     */
    public function edit()
    {
        $tutorProfile = Auth::user()->tutorProfile;
        $subjects = Subject::orderBy('name')->get();

        // Get an array of subject IDs that the tutor is already associated with
        $tutorSubjects = $tutorProfile->subjects()->pluck('subjects.id')->toArray();

        return view('tutor.profile.edit', compact('tutorProfile', 'subjects', 'tutorSubjects'));
    }

    /**
     * Update the tutor's profile in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|min:50',
            'hourly_rate' => 'required|numeric|min:0',
            'subjects' => 'required|array', // Ensure subjects are submitted
            'subjects.*' => 'exists:subjects,id', // Ensure all submitted IDs are valid subjects
        ]);

        $tutorProfile = Auth::user()->tutorProfile;

        // Update the main profile fields
        $tutorProfile->update([
            'bio' => $request->bio,
            'hourly_rate' => $request->hourly_rate,
        ]);

        // Sync the subjects. This handles adding/removing subjects in the pivot table.
        $tutorProfile->subjects()->sync($request->subjects);

        return redirect()->route('tutor.profile.edit')->with('success', 'Your profile has been updated successfully.');
    }
}