@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Create a New Account</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="contact" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="name" type="text" class="form-control" placeholder="Your Name" required="" autofocus autocomplete="name" value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" placeholder="Your Email" required="" autocomplete="username" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>

                        <!-- Password -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="password" type="password" class="form-control" placeholder="Password" required="" autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>
                        
                        <!-- Confirm Password -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required="" autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>

                        <div class="col-md-12 mt-4">
                            <fieldset class="d-flex justify-content-between align-items-center">
                                <a class="underline text-sm text-white hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                
                                <button type="submit" id="form-submit" class="button">Register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection