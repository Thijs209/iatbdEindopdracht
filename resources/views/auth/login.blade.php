@extends('default')
@section('title')
    Register
@endsection

@section('header')


<article class="auth">
    <section class="logo">
        <figure class="auth__figure">
            <img class="auth__img" src="/img/logo.png" alt="">
        </figure>
        <div class="sep-bar"></div>
    </section>
    <form method="POST" action="{{ route('login') }}" class="auth__form">
        @csrf
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Email Address -->
        <section class="auth__input-section">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="auth__text-input" type="email" name="email" :value="old('email')" required autofocus />
        </section>

        <!-- Password -->
        <section class="auth__input-section">
            <x-label for="password" :value="__('Wachtwoord')" />

            <x-input id="password" class="auth__text-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </section>

        <!-- Remember Me -->
        <section class="auth__input-section">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
            </label>
        </section>

        <section class="auth__input-section">
            

            <x-button class="auth__button">
                {{ __('Log in') }}
            </x-button>
            @if (Route::has('password.request'))
                <a class="auth__text-button" href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
            @endif
            <a class="auth__text-button" href="{{ '/register' }}">
                {{ __('Of nog geen account?') }}
            </a>
        </section>
    </form>
    <div class="sep-bar bottom-radius"></div>
</article>

@endsection