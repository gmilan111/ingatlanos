<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Név') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Jelszó') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Jelszó megerősítése') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="phone_number" value="{{__('Telefonszám')}}"/>
                <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" placeholder="06 70 632 3578" pattern="[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{4}" requied autocomplete="phone"/>
            </div>

            <div class="mt-4">
                <label for="magan" class="flex items-center">
                    <x-input id="magan" name="user" type="radio" value="m" required autocomplete="m"/>
                    <span class="ms-2 text-sm text-gray-600">Magánszemély</span>
                </label>
            </div>

            <div class="mt-4">
                <label for="ingatlanos" class="flex items-center">
                    <x-input id="ingatlanos" name="user" type="radio" value="i" required autocomplete="i"/>
                    <span class="ms-2 text-sm text-gray-600">Ingatlanos</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Van már fiókod?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Regisztrálás') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
