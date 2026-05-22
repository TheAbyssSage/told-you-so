<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\TwoFactorChallengeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InfoPageController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('two-factor', [TwoFactorChallengeController::class, 'index'])->name('two-factor.index');
    Route::post('two-factor', [TwoFactorChallengeController::class, 'store'])->name('two-factor.store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('triage', [TriageController::class, 'index'])->name('triage.index');
    Route::post('triage', [TriageController::class, 'store'])->name('triage.store');

    Route::get('availability', [BookingController::class, 'index'])->name('availability.index');
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings', [BookingController::class, 'indexUser'])->name('bookings.index');
});

Route::get('info/{topic}', [InfoPageController::class, 'show'])->name('info.show');
