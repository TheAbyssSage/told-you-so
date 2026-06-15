<?php

namespace App\Http\Controllers;

use App\Models\Psychologist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PsychologistController extends Controller
{
    protected function currentPsychologist(): Psychologist
    {
        $user = Auth::user();

        abort_unless($user && $user->isPsychologist(), 403, 'Only psychologists may access this panel.');

        return $user->psychologist;
    }

    public function dashboard(): View
    {
        $psychologist = $this->currentPsychologist();
        $upcomingAvailabilities = $psychologist->availabilities()->where('starts_at', '>=', now())->count();
        $activeBookings = $psychologist->bookings()->where('status', 'booked')->count();

        return view('psychologist.dashboard', compact('psychologist', 'upcomingAvailabilities', 'activeBookings'));
    }

    public function indexAvailabilities(): View
    {
        $psychologist = $this->currentPsychologist();
        $availabilities = $psychologist->availabilities()->orderBy('starts_at')->get();

        return view('psychologist.availabilities.index', compact('psychologist', 'availabilities'));
    }

    public function createAvailability(): View
    {
        $psychologist = $this->currentPsychologist();

        return view('psychologist.availabilities.create', compact('psychologist'));
    }

    public function storeAvailability(Request $request): RedirectResponse
    {
        $psychologist = $this->currentPsychologist();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'starts_at' => ['required', 'date', 'after:now'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
            'duration_minutes' => ['required', 'integer', 'min:15'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_available' => ['sometimes', 'boolean'],
        ]);

        $psychologist->availabilities()->create(array_merge($data, [
            'is_available' => $request->boolean('is_available', true),
        ]));

        return redirect()->route('psychologist.availabilities.index')->with('success', 'Availability slot created.');
    }

    public function bookings(): View
    {
        $psychologist = $this->currentPsychologist();
        $bookings = $psychologist->bookings()->with('user', 'availability')->orderByDesc('booked_at')->get();

        return view('psychologist.bookings.index', compact('psychologist', 'bookings'));
    }
}
