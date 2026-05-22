@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
            <h1 class="text-3xl font-semibold text-slate-900">Add availability</h1>
            <p class="mt-2 text-slate-600">Create a new session slot for clients to book.</p>
        </div>

        <form method="POST" action="{{ route('psychologist.availabilities.store') }}" class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm space-y-6">
            @csrf

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
                    <input id="title" name="title" value="{{ old('title') }}" type="text" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-slate-700">Price (€)</label>
                    <input id="price" name="price" value="{{ old('price') }}" type="number" step="0.01" min="0" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div>
                    <label for="starts_at" class="block text-sm font-medium text-slate-700">Starts at</label>
                    <input id="starts_at" name="starts_at" value="{{ old('starts_at') }}" type="datetime-local" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div>
                    <label for="ends_at" class="block text-sm font-medium text-slate-700">Ends at</label>
                    <input id="ends_at" name="ends_at" value="{{ old('ends_at') }}" type="datetime-local" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div>
                    <label for="duration_minutes" class="block text-sm font-medium text-slate-700">Duration (minutes)</label>
                    <input id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes') }}" type="number" min="15" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input id="is_available" name="is_available" type="checkbox" value="1" {{ old('is_available', true) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-slate-700 focus:ring-slate-500">
                <label for="is_available" class="text-sm text-slate-700">Make this slot available</label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Save availability</button>
            </div>
        </form>
    </div>
@endsection
