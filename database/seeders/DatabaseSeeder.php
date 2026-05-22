<?php

namespace Database\Seeders;

use App\Models\Availability;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Psychologist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $clients = collect([
            ['name' => 'DKV', 'email_domain' => 'dkv.be', 'description' => 'Client for DKV employees'],
            ['name' => 'Elias', 'email_domain' => 'elias.be', 'description' => 'Client for Elias staff'],
            ['name' => 'MIN Federal', 'email_domain' => 'min.fed.be', 'description' => 'Client for federal ministry users'],
        ])->map(fn ($item) => Client::create($item));

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@dkv.be',
            'password' => 'password',
            'is_admin' => true,
            'client_id' => $clients->firstWhere('email_domain', 'dkv.be')->id,
        ]);

        $users = User::factory(3)->create()->each(fn ($user) => $user->update(['client_id' => $clients->random()->id]));

        $psychologists = collect([
            ['name' => 'Dr. Ann De Vries', 'email' => 'ann@example.com', 'specialty' => 'ADHD and anxiety', 'bio' => 'Experienced psychologist focused on adult ADHD and anxiety support.'],
            ['name' => 'Dr. Sofie Janssens', 'email' => 'sofie@example.com', 'specialty' => 'Autism spectrum', 'bio' => 'Specialist in autism neurodiversity and social wellbeing.'],
            ['name' => 'Dr. Michael Verhoeven', 'email' => 'michael@example.com', 'specialty' => 'Stress management', 'bio' => 'Therapist helping clients manage anxiety and stress.'],
        ])->map(fn ($item) => Psychologist::create($item));

        $availabilitySlots = [];

        foreach ($psychologists as $psychologist) {
            User::factory()->create([
                'name' => $psychologist->name,
                'email' => $psychologist->email,
                'password' => 'password',
                'is_psychologist' => true,
                'psychologist_id' => $psychologist->id,
            ]);

            $availabilitySlots[] = Availability::create([
                'psychologist_id' => $psychologist->id,
                'title' => 'Initial consultation',
                'description' => 'One-to-one intake session with the psychologist.',
                'starts_at' => now()->addDays(3),
                'ends_at' => now()->addDays(3)->addMinutes(50),
                'duration_minutes' => 50,
                'price' => 90.00,
                'is_available' => true,
            ]);

            $availabilitySlots[] = Availability::create([
                'psychologist_id' => $psychologist->id,
                'title' => 'Follow-up session',
                'description' => 'Continuing support and next step planning.',
                'starts_at' => now()->addDays(5),
                'ends_at' => now()->addDays(5)->addMinutes(50),
                'duration_minutes' => 50,
                'price' => 90.00,
                'is_available' => true,
            ]);
        }

        Booking::create([
            'user_id' => $users->first()->id,
            'psychologist_id' => $psychologists->first()->id,
            'availability_id' => $availabilitySlots[0]->id,
            'status' => 'booked',
            'booked_at' => now()->subDay(),
        ]);

        Booking::create([
            'user_id' => $users->skip(1)->first()->id,
            'psychologist_id' => $psychologists->skip(1)->first()->id,
            'availability_id' => $availabilitySlots[2]->id,
            'status' => 'cancelled',
            'booked_at' => now()->subDays(2),
        ]);
    }
}
