<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-burger" type="button" data-target="navMenu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="navbar-menu">
                <div id="navMenu" class="navbar-end">
                    @guest
                        <div class="navbar-item">
                            <div class="buttons">
                                    <a class="button is-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                        <a class="button is-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <div id="navbarDropdown" class="navbar-link is-arrowless" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="navbar-dropdown is-right" aria-labelledby="navbarDropdown">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="columns">
            @auth
                @include('layouts.aside')
            @endauth
            <div class="column">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
