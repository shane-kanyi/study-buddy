@extends('layouts.guest')

@section('title', 'Book a Session')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Book a Session with {{ $tutor->name }}</h2>
                    <p>Select a subject and propose a time for your session.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form id="contact" action="{{ route('booking.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="subject_id" class="text-white mb-2">Subject:</label>
                            <select name="subject_id" id="subject_id" class="form-control" required>
                                <option value="">-- Select a Subject --</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <label for="date" class="text-white mb-2">Date:</label>
                                <input name="date" type="date" class="form-control" id="date" required="" value="{{ old('date') }}">
                                @error('date') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <label for="time" class="text-white mb-2">Time:</label>
                                <input name="time" type="time" class="form-control" id="time" required="" value="{{ old('time') }}">
                                @error('time') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                             <fieldset>
                                <label for="duration_minutes" class="text-white mb-2">Duration (in minutes):</label>
                                <input name="duration_minutes" type="number" class="form-control" id="duration_minutes" placeholder="e.g., 60" required="" value="{{ old('duration_minutes', 60) }}">
                                @error('duration_minutes') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Send Booking Request</button>
                                <a href="{{ url()->previous() }}" class="button" style="background-color: #6c757d;">Cancel</a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection