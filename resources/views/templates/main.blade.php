<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="https://img.pngio.com/code-icon-png-364047-free-icons-library-code-icon-png-256_256.jpg" type="image/x-icon">
        <title>{{ config('app.name', 'Login Authentication') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Js --}}
        <script src="{{ asset('js/app.js') }} defer"></script>

    </head>
    <body>
        <nav class="navbar sub-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">{{ config('app.name', 'Login Auth') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        @can('logged-in')
                            @can('is-admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                                </li>
                            @endcan
                        @endcan
                    </ul>
                    <div class="d-flex">
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    <a href="{{ route('user.profile') }}">{{ Auth::user()->name }}</a>
                                    <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                                @else
                                    <a href="{{ route('login') }}">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
          </nav>
        <main>
            <div class="container">
                @include('partials.alerts')
                @yield('content')
            </div>
        </main>
    </body>
</html>
