@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<section class="section contact" style="padding-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Log In to Your Account</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form id="contact" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <!-- Email Address -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" placeholder="Your Email" required="" autofocus autocomplete="username" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>

                        <!-- Password -->
                        <div class="col-md-12">
                            <fieldset>
                                <input name="password" type="password" class="form-control" placeholder="Password" required="" autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            </fieldset>
                        </div>

                        <div class="col-md-12 mt-4">
                            <fieldset class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-white hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                
                                <button type="submit" id="form-submit" class="button">Log in</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection