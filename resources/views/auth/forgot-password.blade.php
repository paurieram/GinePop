@extends('master')

@section('body')
<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1 my-5" style="border-radius: 10px; background-color: white; box-shadow: 0px 0px 5px #000;">
    <h1 class="px-5 pt-4 h1"><b>Recuperar contrasenya</b></h1>
    <div class="mb-4 px-5 pt-4 text-sm text-gray-600">
        {{ __("Has oblidat la contrasenya? Cap problema. Només digue'ns el teu mail i t'enviarem un enllaç de recuperació per crear una nova.") }}
    <br><b><u><a href='https://mail.google.com' target='_blank'>Accedir a Gmail</a></u></b></div>

    @if (session('status'))
    <div class="ms-auto">
        <div style="padding: 5px; display: none;" id="error">
            <div id="inner-message" class="alert alert-success fixed-top-right" role="alert"></div>
        </div>
    </div>
    <div class="mb-4 font-medium text-sm text-green-600 hidden" id="succont">
        {{ session('status') }}
    </div>
    <script>succes();</script>
    @endif
    <form method="POST" class="px-5 pt-4" action="{{ route('password.email') }}">
        @csrf
        <div class="block">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" style="box-shadow: 0px 0px 3px #aaa !important" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <x-jet-validation-errors class="mb-4" id="validationerr" />
        <div class="flex items-center justify-end my-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 me-4" href="{{ route('login') }}">
                {{ __("Ja te'n recordes?") }}
            </a>
            <x-jet-button>
                {{ __('Enviar enllaç de confirmació') }}
            </x-jet-button>
        </div>
    </form>
</div>
@endsection