@extends('layouts.guest')

@section('title', 'Manage My Sessions')

@section('content')
<section class="section contact" style="min-height: 80vh; padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Manage Your Sessions</h2>
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
                                <th>Student</th>
                                <th>Subject</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sessions as $session)
                            <tr>
                                <td>{{ $session->student->name }}</td>
                                <td>{{ $session->subject->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($session->scheduled_at)->format('D, M j, Y @ g:i A') }}</td>
                                <td><span class="badge bg-{{ $session->status == 'pending' ? 'warning' : ($session->status == 'confirmed' ? 'success' : 'danger') }}">{{ ucfirst($session->status) }}</span></td>
                                <td>
                                    @if($session->status == 'pending')
                                    <form action="{{ route('tutor.sessions.confirm', $session) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                                    </form>
                                    <form action="{{ route('tutor.sessions.cancel', $session) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                    </form>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5">You have no session requests.</td></tr>
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