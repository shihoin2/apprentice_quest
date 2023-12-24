@extends('conduit.layouts.master')
@section('content')

<div class="auth-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12">
                <h1 class="text-xs-center">Sign in</h1>
                <p class="text-xs-center">
                    <a href="/register">Need an account?</a>
                </p>

                <!-- <ul class="error-messages">
                    <li>That email is already taken</li>
                </ul> -->
                @if (Route::has('email.request'))
                <ul class="error-messages">
                    <li>That email is already taken</li>
                </ul>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- <fieldset class="form-group"> -->
                    <x-input-label class="form-group"/>
                    <!-- <input class="form-control form-control-lg" type="text" placeholder="Email" /> -->
                    <x-text-input class="form-control form-control-lg" type="text" placeholder="Email" />
                    <!-- </fieldset> -->
                    <!-- <fieldset class="form-group"> -->
                    <x-input-label class="form-group"/>
                        <!-- <input class="form-control form-control-lg" type="password" placeholder="Password" /> -->
                        <x-text-input class="form-control form-control-lg" type="password" placeholder="Password" />
                    <!-- </fieldset> -->
                    <!-- <button class="btn btn-lg btn-primary pull-xs-right">Sign in</button> -->
                    <x-primary-button class="btn btn-lg btn-primary pull-xs-right">Sign in</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection('content')
