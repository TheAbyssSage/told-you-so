@extends('layouts.app')

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-3xl font-semibold text-slate-900">Welcome, {{ auth()->user()->name }}</h1>
        <p class="mt-4 text-slate-600">Your client: {{ auth()->user()->client?->name ?? 'Individual user' }}</p>

        <div class="mt-8 grid gap-4 sm:grid-cols-2">
            <a href="{{ route('availability.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 hover:bg-slate-100">
                <h2 class="font-semibold text-slate-900">View availability</h2>
                <p class="mt-2 text-slate-600">Browse psychologist sessions and book your next appointment.</p>
            </a>
            <a href="{{ route('triage.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 hover:bg-slate-100">
                <h2 class="font-semibold text-slate-900">Complete your triage</h2>
                <p class="mt-2 text-slate-600">Tell us about your current condition and medication status.</p>
            </a>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-slate-900">Your current booking count</h2>
            <p class="mt-2 text-slate-600">You have {{ auth()->user()->bookings()->where('status', 'booked')->count() }} active booking(s).</p>
        </div>
    </div>
@endsection
