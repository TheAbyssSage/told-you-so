@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
            <h1 class="text-3xl font-semibold text-slate-900">Psychologist panel</h1>
            <p class="mt-4 text-slate-600">Manage your own availability and review sessions booked by clients.</p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm text-slate-500">Your profile</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900">{{ $psychologist->name }}</p>
                    <p class="mt-1 text-slate-600">{{ $psychologist->specialty }}</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm text-slate-500">Upcoming availability</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900">{{ $upcomingAvailabilities }}</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm text-slate-500">Booked sessions</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900">{{ $activeBookings }}</p>
                </div>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <a href="{{ route('psychologist.availabilities.index') }}" class="rounded-3xl border border-slate-200 bg-white px-6 py-8 shadow-sm hover:border-slate-300">
                <h2 class="font-semibold text-slate-900">Manage availability</h2>
                <p class="mt-2 text-slate-600">See your scheduled slots and add new availability.</p>
            </a>

            <a href="{{ route('psychologist.bookings.index') }}" class="rounded-3xl border border-slate-200 bg-white px-6 py-8 shadow-sm hover:border-slate-300">
                <h2 class="font-semibold text-slate-900">Review bookings</h2>
                <p class="mt-2 text-slate-600">View clients who booked sessions with you.</p>
            </a>
        </div>
    </div>
@endsection
