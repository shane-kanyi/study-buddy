@extends('layouts.guest')

@section('title', 'Manage Tutors')

@section('content')
<section class="section contact" style="min-height: 80vh; padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Manage Tutor Applications</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Applied On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tutorProfiles as $profile)
                        <tr>
                            <td>{{ $profile->user->name }}</td>
                            <td>{{ $profile->user->email }}</td>
                            <td>
                                @if ($profile->verified_at)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending Review</span>
                                @endif
                            </td>
                            <td>{{ $profile->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('admin.tutors.verify', $profile) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if ($profile->verified_at)
                                        <button type="submit" class="btn btn-sm btn-danger">Un-verify</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-success">Verify</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No tutor applications found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection