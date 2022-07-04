<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('favicon.ico') }}" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __("Gràcies per registrar-te! Abans de començar, podries confirmar el teu correu electrònic clicant en l'enllaç que t'acabem d'enviar? Si no has rebut el correu electrònic, t'enviarem un altre.") }}
            <b><u><a href='https://mail.google.com' target='_blank'>Accedir a Gmail</a></u></b></div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('S\'ha enviat un enllaç de verificació nou a l\'adreça electrònica que vau proporcionar durant el registre.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar correu') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Sortir') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
