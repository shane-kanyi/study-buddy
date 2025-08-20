@extends('layouts.guest')

@section('title', 'Manage My Profile')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Manage Your Profile</h2>
                    <p>Keep your details up to date and select the subjects you teach.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="contact" action="{{ route('tutor.profile.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                             <fieldset>
                                <textarea name="bio" rows="6" class="form-control" placeholder="Tell us about yourself..." required="">{{ old('bio', $tutorProfile->bio) }}</textarea>
                                @error('bio')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                             <fieldset>
                                <input name="hourly_rate" type="number" class="form-control" placeholder="Your Hourly Rate" required="" value="{{ old('hourly_rate', $tutorProfile->hourly_rate) }}">
                                @error('hourly_rate')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-white mb-2">Select your subjects:</label>
                            <div class="bg-white p-3 rounded">
                                @forelse($subjects as $subject)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $subject->id }}" id="subject-{{ $subject->id }}"
                                            {{ in_array($subject->id, $tutorSubjects) ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="subject-{{ $subject->id }}">
                                            {{ $subject->name }}
                                        </label>
                                    </div>
                                @empty
                                    <p>No subjects have been added by the administrator yet.</p>
                                @endforelse
                            </div>
                             @error('subjects')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Update Profile</button>
                                <a href="{{ route('dashboard') }}" class="button" style="background-color: #6c757d;">Back to Dashboard</a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection