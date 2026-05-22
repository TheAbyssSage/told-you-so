<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Tell You') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b shadow-sm">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="text-lg font-semibold text-slate-900">Tell You</a>
                    <button id="mobile-menu-button" type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:bg-slate-50 sm:hidden" aria-controls="main-navigation" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <nav id="main-navigation" class="hidden flex-col gap-3 text-sm text-slate-700 sm:flex sm:flex-row sm:items-center sm:gap-4">
                    <a href="{{ route('home') }}" class="hover:text-slate-900">Home</a>
                    <a href="{{ route('info.show', 'adhd') }}" class="hover:text-slate-900">ADHD</a>
                    <a href="{{ route('info.show', 'autism') }}" class="hover:text-slate-900">Autism</a>
                    <a href="{{ route('info.show', 'angst') }}" class="hover:text-slate-900">Angst</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-slate-900">Dashboard</a>
                        <a href="{{ route('availability.index') }}" class="hover:text-slate-900">Availability</a>
                        <a href="{{ route('bookings.index') }}" class="hover:text-slate-900">Bookings</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-slate-700 hover:text-slate-900">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="hover:text-slate-900">Register</a>
                        <a href="{{ route('login') }}" class="hover:text-slate-900">Login</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="flex-1">
            <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
                @if(session('status'))
                    <div class="mb-6 rounded-lg border border-slate-200 bg-white p-4 text-sm text-slate-800 shadow-sm">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 p-4 text-sm text-rose-900 shadow-sm">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var button = document.getElementById('mobile-menu-button');
            var nav = document.getElementById('main-navigation');

            if (!button || !nav) {
                return;
            }

            button.addEventListener('click', function () {
                var expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                nav.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
