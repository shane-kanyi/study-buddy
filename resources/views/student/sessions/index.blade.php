@extends('layouts.guest')

@section('title', 'My Booked Sessions')

@section('content')
<section class="section contact" style="min-height: 80vh; padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>My Sessions</h2>
                    <p>Here is a list of all your past and upcoming tutoring sessions.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Tutor</th>
                                <th>Subject</th>
                                <th>Date & Time</th>
                                <th>Duration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sessions as $session)
                            <tr>
                                <td>{{ $session->tutor->name }}</td>
                                <td>{{ $session->subject->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($session->scheduled_at)->format('D, M j, Y @ g:i A') }}</td>
                                <td>{{ $session->duration_minutes }} mins</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        ['pending' => 'warning', 'confirmed' => 'success', 'cancelled' => 'danger', 'completed' => 'secondary'][$session->status] ?? 'dark'
                                    }} text-dark">
                                        {{ ucfirst($session->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">You have not booked any sessions yet. <a href="{{ route('tutors.index') }}">Find a Tutor</a> to get started.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('dashboard') }}" class="button mt-3">Back to Dashboard</a>
            </div>
        </div>
    </div>
</section>
@endsection