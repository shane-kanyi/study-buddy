@extends('layouts.guest')

@section('title', 'Apply to be a Tutor')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Tutor Application</h2>
                    <p>Fill out the form below to be considered as a tutor on Study Buddy.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form id="contact" action="{{ route('tutor.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="bio" rows="6" class="form-control" placeholder="Tell us about yourself, your qualifications, and teaching style (min. 50 characters)..." required="">{{ old('bio') }}</textarea>
                                @error('bio')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                             <fieldset>
                                <input name="hourly_rate" type="number" class="form-control" placeholder="Your Hourly Rate (e.g., 20)" required="" value="{{ old('hourly_rate') }}">
                                @error('hourly_rate')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Submit Application</button>
                                <a href="{{ route('dashboard') }}" class="button" style="background-color: #6c757d;">Cancel</a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection