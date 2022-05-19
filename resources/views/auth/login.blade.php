@extends('master')

@section('body')
<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1 my-5" style="box-shadow: 0px 0px 5px #000; border-radius: 10px; background-color: white; ">
    <!-- <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot> -->


    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <div class="login">
        <h1 class="px-5 pt-4 h1"><b>Inici de sessió</b></h1>
        <form method="POST" class="px-5 pt-4" action="{{ route('login') }}">
            @csrf

            <div class="form-floating mb-3">
                <x-jet-input id="email" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="email" name="email" :value="old('email')" required autofocus />
                <x-jet-label for="email" value="{{ __('Email') }}" />
            </div>

            <div class="form-floating mb-3">
                <x-jet-input id="password" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="password" name="password" required autocomplete="current-password" />
                <x-jet-label for="password" value="{{ __('Password') }}" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <x-jet-validation-errors class="my-3" />
            <div class="flex items-center justify-end my-4">
                <a class="underline me-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    Create a new account
                </a>
                @if (Route::has('password.request'))
                <a class="underline me-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button>
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
@endsection