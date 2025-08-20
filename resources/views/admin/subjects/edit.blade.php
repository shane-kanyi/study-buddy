@extends('layouts.guest')

@section('title', 'Edit Subject')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Edit Subject: {{ $subject->name }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form id="contact" action="{{ route('admin.subjects.update', $subject) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="name" type="text" class="form-control" placeholder="Subject Name" required="" value="{{ old('name', $subject->name) }}">
                                @error('name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Update Subject</button>
                                <a href="{{ route('admin.subjects.index') }}" class="button" style="background-color: #6c757d;">Cancel</a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection