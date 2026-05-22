<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorChallengeController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->session()->has('two_factor_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.two-factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $user = User::find($request->session()->get('two_factor_user_id'));

        if (! $user) {
            return redirect()->route('login');
        }

        if (! $user->two_factor_code || ! $user->two_factor_expires_at || $user->two_factor_expires_at->isPast()) {
            return back()->withErrors(['code' => 'The two-factor authentication code is invalid or expired.']);
        }

        $user->update([
            'two_factor_code' => null,
            'two_factor_expires_at' => null,
        ]);

        Auth::login($user, $request->session()->pull('two_factor_remember', false));
        $request->session()->forget('two_factor_user_id');

        return redirect()->route('dashboard');
    }
}
