@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Verify your email</h1>
        <p class="mt-4 text-slate-600">We emailed a verification link to your inbox. Please click the link to activate your account.</p>

        <form method="POST" action="{{ route('verification.send') }}" class="mt-8">
            @csrf
            <button type="submit" class="rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Resend verification email</button>
        </form>
    </div>
@endsection
