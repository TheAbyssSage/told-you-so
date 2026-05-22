<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Psychologist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'specialty',
        'bio',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
