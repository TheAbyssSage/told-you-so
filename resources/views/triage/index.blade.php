@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Initial triage</h1>
        <p class="mt-4 text-slate-600">Help us understand your current needs so we can recommend the right support.</p>

        <form method="POST" action="{{ route('triage.store') }}" class="mt-8 space-y-6">
            @csrf
            <div class="space-y-4">
                <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                    <input type="checkbox" name="has_adhd" value="1" @checked(old('has_adhd', $user->has_adhd)) class="rounded border-slate-200 text-slate-900 focus:ring-slate-400">
                    I have ADHD
                </label>
                <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                    <input type="checkbox" name="has_autism" value="1" @checked(old('has_autism', $user->has_autism)) class="rounded border-slate-200 text-slate-900 focus:ring-slate-400">
                    I have autism
                </label>
                <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                    <input type="checkbox" name="has_anxiety" value="1" @checked(old('has_anxiety', $user->has_anxiety)) class="rounded border-slate-200 text-slate-900 focus:ring-slate-400">
                    I have anxiety
                </label>
                <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                    <input type="checkbox" name="medication" value="1" @checked(old('medication', $user->medication)) class="rounded border-slate-200 text-slate-900 focus:ring-slate-400">
                    I am currently taking medication
                </label>
                <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                    <input type="checkbox" name="in_treatment" value="1" @checked(old('in_treatment', $user->in_treatment)) class="rounded border-slate-200 text-slate-900 focus:ring-slate-400">
                    I am currently in treatment
                </label>
            </div>
            <button type="submit" class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Save triage</button>
        </form>
    </div>
@endsection
