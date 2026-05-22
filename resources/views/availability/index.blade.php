@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
            <h1 class="text-2xl font-semibold text-slate-900">Psychologist availability</h1>
            <p class="mt-3 text-slate-600">Book up to two sessions. If you already have two active appointments, you cannot book another.</p>
        </div>

        @if($availabilities->isEmpty())
            <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm text-slate-600">No available sessions are currently open. Please check back later.</div>
        @else
            <div class="grid gap-4">
                @foreach($availabilities as $availability)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">{{ $availability->title }}</h2>
                                <p class="text-sm text-slate-600">{{ $availability->psychologist->name }} · {{ $availability->psychologist->specialty ?? 'Psychologist' }}</p>
                            </div>
                            <div class="text-right text-sm text-slate-700">
                                <p>{{ $availability->starts_at->format('F j, Y \a\t g:i a') }}</p>
                                <p>{{ $availability->duration_minutes }} minutes · €{{ number_format($availability->price, 2) }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-slate-600">{{ $availability->description }}</p>
                        <form method="POST" action="{{ route('bookings.store') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="availability_id" value="{{ $availability->id }}">
                            <button type="submit" class="rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Book this session</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
