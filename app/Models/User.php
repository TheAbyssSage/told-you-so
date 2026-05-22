<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'client_id',
    'is_admin',
    'has_adhd',
    'has_autism',
    'has_anxiety',
    'medication',
    'in_treatment',
    'two_factor_code',
    'two_factor_expires_at',
])]
#[Hidden(['password', 'remember_token', 'two_factor_code'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'two_factor_expires_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'has_adhd' => 'boolean',
            'has_autism' => 'boolean',
            'has_anxiety' => 'boolean',
            'medication' => 'boolean',
            'in_treatment' => 'boolean',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function canAccessFilament(): bool
    {
        return $this->is_admin;
    }
}
