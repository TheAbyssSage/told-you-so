@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
            <h1 class="text-3xl font-semibold text-slate-900">Your booked sessions</h1>
            <p class="mt-2 text-slate-600">See the clients who have reserved your available sessions.</p>
        </div>

        @if($bookings->isEmpty())
            <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm text-slate-600">No sessions have been booked yet.</div>
        @else
            <div class="grid gap-4">
                @foreach($bookings as $booking)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">{{ $booking->availability->title }}</h2>
                                <p class="mt-1 text-sm text-slate-600">{{ $booking->user->name }} booked this session.</p>
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
    </div>
@endsection
