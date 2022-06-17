@extends('master')

@section('body')
<script src="/js/register.js"></script>
<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1 my-5" style="border-radius: 10px; background-color: white; box-shadow: 0px 0px 5px #000;">

    <h1 class="px-5 pt-4 h1"><b>Registre't</b></h1>

    <form id="registerform" method="POST" action="{{ route('register') }}" class="px-5 pt-4">
        @csrf
        <div class="form-floating mb-3">
            <x-jet-input id="name" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
            <x-jet-label for="name" value="{{ __('Nom') }}" />
        </div>

        <div class="form-floating mb-3">
            <x-jet-input id="surname" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            <x-jet-label for="surname" value="{{ __('Cognom') }}" />
        </div>

        <div class="form-floating mb-3">
            <x-jet-input id="email" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="email" name="email" :value="old('email')" required />
            <x-jet-label for="email" value="{{ __('Email') }}" />
        </div>
        <div class="row g-1">
            <div class="form-floating col">
                <x-jet-input id="password" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="password" name="password" required autocomplete="new-password" />
                <x-jet-label for="password" value="{{ __('Contrasenya') }}" />
            </div>

            <div class="form-floating col">
                <x-jet-input id="password_confirmation" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contrasenya') }}" />
            </div>
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-jet-label for="terms">
                <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms" />

                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-jet-label>
        </div>
        @endif
        <x-jet-validation-errors class="mt-4 mx-2" id="validationerr" />
        <div id="mailvalidation" style="display: none; color: red;" class="mt-0 mx-2"></div>

        <div class="flex items-center justify-end my-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Ja tens compte?') }}
            </a>

            <x-jet-button class="ml-4 nav-link btn btn-outline-success">
                {{ __('Registrar-me') }}
            </x-jet-button>
        </div>
    </form>
</div>
@endsection