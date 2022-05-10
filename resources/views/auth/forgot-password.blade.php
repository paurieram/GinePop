@extends('master')

@section('body')
<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1 my-5" style="border: solid 2px #84c236; border-radius: 10px;">
    <h1 class="px-5 pt-4 h1"><b>Recuperar contrasenya</b></h1>
    <div class="mb-4 px-5 pt-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    
    
    <form method="POST" class="px-5 pt-4" action="{{ route('password.email') }}">
        @csrf
        
        <div class="block">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        
        <x-jet-validation-errors class="mb-4"/>
        <div class="flex items-center justify-end my-4">
            <x-jet-button>
                {{ __('Email Password Reset Link') }}
            </x-jet-button>
        </div>
    </form>
</div>
@endsection