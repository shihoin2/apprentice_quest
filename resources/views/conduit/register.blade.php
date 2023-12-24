@extends('conduit.layouts.master')
@section('content')


<div class="auth-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12">
                <h1 class="text-xs-center">Sign up</h1>
                <p class="text-xs-center">
                    <a href="/login">Have an account?</a>
                </p>

                <!-- <ul class="error-messages">
                    <li>That email is already taken</li>
                </ul> -->

                @if (Route::has('email.request'))
                <ul class="error-messages">
                    <li>That email is already taken</li>
                </ul>
                @endif



                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <fieldset class="form-group">
                        <!-- <input class="form-control form-control-lg" type="text" placeholder="Username" /> -->
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </fieldset>

                    <fieldset class="form-group">
                        <!-- <input class="form-control form-control-lg" type="text" placeholder="Email" /> -->
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </fieldset>

                    <fieldset class="form-group">
                        <!-- <input class="form-control form-control-lg" type="password" placeholder="Password" /> -->
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </fieldset>

                    <!-- <button class="btn btn-lg btn-primary pull-xs-right">Sign up</button> -->
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection('content')
