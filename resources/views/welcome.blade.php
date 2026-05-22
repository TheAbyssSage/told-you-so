@extends('layouts.app')

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-3xl font-semibold text-slate-900">Tell You</h1>
        <p class="mt-4 text-slate-600">A psychotherapist booking app for clients, psychologists, and users with triage, availability, and secure booking flow.</p>

        <div class="mt-8 grid gap-4 md:grid-cols-2">
            @guest
                <a href="{{ route('register') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-left hover:bg-slate-100">
                    <h2 class="font-semibold text-slate-900">Register</h2>
                    <p class="mt-2 text-slate-600">Create your account and access psychologist availability.</p>
                </a>

                <a href="{{ route('login') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-left hover:bg-slate-100">
                    <h2 class="font-semibold text-slate-900">Log in</h2>
                    <p class="mt-2 text-slate-600">Already have an account? Sign in to continue.</p>
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-left hover:bg-slate-100">
                    <h2 class="font-semibold text-slate-900">Dashboard</h2>
                    <p class="mt-2 text-slate-600">View your profile, upcoming sessions, and triage details.</p>
                </a>

                <a href="{{ route('availability.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-left hover:bg-slate-100">
                    <h2 class="font-semibold text-slate-900">Availability</h2>
                    <p class="mt-2 text-slate-600">Browse psychologist availability and book a session.</p>
                </a>

                @if(auth()->user()->isPsychologist())
                    <a href="{{ route('psychologist.dashboard') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-left hover:bg-slate-100">
                        <h2 class="font-semibold text-slate-900">Psychologist panel</h2>
                        <p class="mt-2 text-slate-600">Manage your own availability and review booked sessions.</p>
                    </a>
                @endif
            @endguest
        </div>
    </div>
@endsection
