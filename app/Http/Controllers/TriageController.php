<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TriageController extends Controller
{
    public function index()
    {
        return view('triage.index', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'has_adhd' => ['boolean'],
            'has_autism' => ['boolean'],
            'has_anxiety' => ['boolean'],
            'medication' => ['boolean'],
            'in_treatment' => ['boolean'],
        ]);

        Auth::user()->update([
            'has_adhd' => $request->boolean('has_adhd'),
            'has_autism' => $request->boolean('has_autism'),
            'has_anxiety' => $request->boolean('has_anxiety'),
            'medication' => $request->boolean('medication'),
            'in_treatment' => $request->boolean('in_treatment'),
        ]);

        return back()->with('success', 'Your triage responses have been saved.');
    }
}
