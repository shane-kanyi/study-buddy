@extends('layouts.guest')

@section('title', 'Add Subject')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Add a New Subject</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form id="contact" action="{{ route('admin.subjects.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="name" type="text" class="form-control" placeholder="Subject Name (e.g., Mathematics)" required="" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Create Subject</button>
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