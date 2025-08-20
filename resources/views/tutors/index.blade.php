@extends('layouts.guest')

@section('title', 'Find a Tutor')

@section('content')
<section class="section courses" data-section="section4" style="padding-top: 150px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Find Your Tutor</h2>
                    <p>Browse our list of verified tutors ready to help you succeed.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($tutors as $tutor)
                <div class="col-md-4">
                    <div class="item" style="margin: 15px;">
                        {{-- We can add a default tutor image later --}}
                        {{-- <img src="assets/images/courses-01.jpg" alt="Tutor Photo"> --}}
                        <div class="down-content">
                            <h4>{{ $tutor->name }}</h4>
                            <p>{{ Str::limit($tutor->tutorProfile->bio, 100) }}</p>

                            <div class="mb-3">
                                <strong>Subjects:</strong>
                                @foreach($tutor->tutorProfile->subjects as $subject)
                                    <span class="badge bg-info text-dark">{{ $subject->name }}</span>
                                @endforeach
                            </div>

                            <div class="text-button-pay">
                                <a href="{{ route('tutors.show', $tutor) }}">
                                    View Profile (Rate: ${{ number_format($tutor->tutorProfile->hourly_rate, 2) }}/hr) <i class="fa fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-white text-center">No tutors are available at this time. Please check back later.</p>
                </div>
            @endforelse
        </div>
        
        {{-- Pagination Links --}}
        <div class="row justify-content-center mt-4">
            <div class="col-auto">
                {{ $tutors->links() }}
            </div>
        </div>
    </div>
</section>
@endsection