@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label class="text-sm font-medium text-slate-700" for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700" for="password">Password</label>
                <input id="password" name="password" type="password" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div class="flex items-center justify-between text-sm text-slate-600">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-slate-200 text-slate-900 focus:ring-slate-400" />
                    Remember me
                </label>
                <span>Two-factor auth will be sent to your email after signing in.</span>
            </div>
            <button type="submit" class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Continue</button>
        </form>

        <p class="mt-6 text-sm text-slate-600">Don’t have an account? <a href="{{ route('register') }}" class="font-semibold text-slate-900 underline">Register</a>.</p>
    </div>
@endsection
