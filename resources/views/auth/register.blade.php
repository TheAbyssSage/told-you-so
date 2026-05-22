@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Register</h1>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label class="text-sm font-medium text-slate-700" for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700" for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700" for="password">Password</label>
                <input id="password" name="password" type="password" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-2 block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
            </div>
            <button type="submit" class="w-full rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Create account</button>
        </form>

        <p class="mt-6 text-sm text-slate-600">Already registered? <a href="{{ route('login') }}" class="font-semibold text-slate-900 underline">Log in</a>.</p>
    </div>
@endsection
