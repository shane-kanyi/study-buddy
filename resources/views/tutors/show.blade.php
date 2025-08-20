@extends('layouts.guest')

@section('title', $tutor->name . ' - Tutor Profile')

@section('content')
<section class="section why-us" data-section="section2" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>{{ $tutor->name }}'s Profile</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div id='tabs'>
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- Placeholder for a tutor profile image --}}
                                    <img src="{{ asset('assets/images/choose-us-image-01.png') }}" alt="Tutor Profile Picture">
                                </div>
                                <div class="col-md-6">
                                    <h4>Expert Tutor</h4>
                                    <p>{{ $tutor->tutorProfile->bio }}</p>
                                    <h5 class="mt-4">Hourly Rate: ${{ number_format($tutor->tutorProfile->hourly_rate, 2) }}</h5>
                                    
                                    <div class="mt-4">
                                        <h5>Subjects Offered:</h5>
                                        @foreach($tutor->tutorProfile->subjects as $subject)
                                            <span class="badge bg-primary" style="font-size: 1rem;">{{ $subject->name }}</span>
                                        @endforeach
                                    </div>
                                    
                                    <div class="main-button mt-4">
                                        @auth
                                            {{-- Only show the booking button if the logged-in user is NOT the tutor themselves --}}
                                            @if(auth()->user()->id !== $tutor->id)
                                                <a href="{{ route('booking.create', ['tutor' => $tutor]) }}">Book a Session with {{ $tutor->name }}</a>
                                            @endif
                                        @else
                                            {{-- Show a login prompt for guests --}}
                                            <a href="{{ route('login') }}">Login to Book a Session</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection