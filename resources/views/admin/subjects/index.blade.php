@extends('layouts.guest')

@section('title', 'Manage Subjects')

@section('content')
<section class="section contact" style="min-height: 80vh; padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Manage Subjects</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Add New Subject</a>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No subjects found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection