@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-slate-900">Your availability</h1>
                <p class="mt-2 text-slate-600">Manage the sessions you make available to clients.</p>
            </div>

            <a href="{{ route('psychologist.availabilities.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                Add availability
            </a>
        </div>

        @if($availabilities->isEmpty())
            <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm text-slate-600">
                You have no availability slots yet. Create your first session to make it visible to clients.
            </div>
        @else
            <div class="grid gap-4">
                @foreach($availabilities as $availability)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">{{ $availability->title }}</h2>
                                <p class="mt-1 text-sm text-slate-600">{{ $availability->description }}</p>
                            </div>
                            <div class="text-sm text-slate-700">
                                <p>{{ $availability->starts_at->format('F j, Y \a\t g:i a') }}</p>
                                <p>{{ $availability->duration_minutes }} minutes · €{{ number_format($availability->price, 2) }}</p>
                                <p class="mt-1 font-semibold {{ $availability->is_available ? 'text-emerald-700' : 'text-rose-700' }}">
                                    {{ $availability->is_available ? 'Available' : 'Unavailable' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
