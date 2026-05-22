@extends('layouts.app')

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Your bookings</h1>
        <p class="mt-4 text-slate-600">Review your upcoming appointments with psychologists.</p>
    </div>

    @if($bookings->isEmpty())
        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm text-slate-600">You have no booked sessions yet.</div>
    @else
        <div class="grid gap-4">
            @foreach($bookings as $booking)
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-900">{{ $booking->availability->title }}</h2>
                            <p class="text-sm text-slate-600">With {{ $booking->psychologist->name }}</p>
                        </div>
                        <div class="text-sm text-slate-700">
                            <p>{{ $booking->availability->starts_at->format('F j, Y \a\t g:i a') }}</p>
                            <p>Status: {{ ucfirst($booking->status) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
