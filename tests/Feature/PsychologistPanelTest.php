<?php

namespace Tests\Feature;

use App\Models\Psychologist;
use App\Models\User;
use Tests\TestCase;

class PsychologistPanelTest extends TestCase
{
    public function test_non_psychologist_cannot_access_psychologist_panel(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('psychologist.dashboard'));

        $response->assertStatus(403);
    }

    public function test_psychologist_can_view_panel_and_create_availability(): void
    {
        $psychologist = Psychologist::create([
            'name' => 'Dr. Test Psychologist',
            'email' => 'dr-test@example.com',
            'specialty' => 'Performance coaching',
            'bio' => 'Helps clients manage stress and work-life balance.',
            'active' => true,
        ]);

        $user = User::factory()->create([
            'name' => $psychologist->name,
            'email' => 'dr-test@example.com',
            'password' => 'password',
            'is_psychologist' => true,
            'psychologist_id' => $psychologist->id,
        ]);

        $response = $this->actingAs($user)->get(route('psychologist.dashboard'));
        $response->assertStatus(200);
        $response->assertSeeText('Psychologist panel');

        $storeResponse = $this->actingAs($user)->post(route('psychologist.availabilities.store'), [
            'title' => 'Test session',
            'description' => 'New patient consultation.',
            'starts_at' => now()->addDays(4)->format('Y-m-d\TH:i'),
            'ends_at' => now()->addDays(4)->addMinutes(50)->format('Y-m-d\TH:i'),
            'duration_minutes' => 50,
            'price' => 120.00,
            'is_available' => true,
        ]);

        $storeResponse->assertRedirect(route('psychologist.availabilities.index'));
        $this->assertDatabaseHas('availabilities', [
            'psychologist_id' => $psychologist->id,
            'title' => 'Test session',
            'is_available' => true,
        ]);
    }
}
