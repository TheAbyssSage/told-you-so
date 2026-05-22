<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $availabilities = Availability::with('psychologist')
            ->where('is_available', true)
            ->where('starts_at', '>', now())
            ->orderBy('starts_at')
            ->get();

        return view('availability.index', compact('availabilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'availability_id' => ['required', 'exists:availabilities,id'],
        ]);

        $user = Auth::user();

        if ($user->bookings()->where('status', 'booked')->count() >= 2) {
            return back()->withErrors(['availability_id' => 'You may only book two sessions.']);
        }

        $availability = Availability::findOrFail($request->availability_id);

        if (! $availability->is_available) {
            return back()->withErrors(['availability_id' => 'This slot is no longer available.']);
        }

        Booking::create([
            'user_id' => $user->id,
            'psychologist_id' => $availability->psychologist_id,
            'availability_id' => $availability->id,
            'status' => 'booked',
            'booked_at' => now(),
        ]);

        $availability->update(['is_available' => false]);

        return redirect()->route('bookings.index')->with('success', 'Your session has been booked.');
    }

    public function indexUser()
    {
        $bookings = Auth::user()->bookings()
            ->with('psychologist', 'availability')
            ->orderByDesc('created_at')
            ->get();

        return view('bookings.index', compact('bookings'));
    }
}
