@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Two-factor authentication</h1>
        <p class="mt-4 text-slate-600">Enter the 6-digit code we sent to your email to complete login.</p>

        <form method="POST" action="{{ route('two-factor.store') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label class="text-sm font-medium text-slate-700" for="code">Authentication code</label>
                <input id="code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" required />
            </div>
            <button type="submit" class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Verify and continue</button>
        </form>

        <p class="mt-6 text-sm text-slate-600">If you haven’t received a code, log in again to resend it.</p>
    </div>
@endsection
