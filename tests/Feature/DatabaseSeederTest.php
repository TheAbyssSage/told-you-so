<?php

namespace Tests\Feature;

use App\Models\Availability;
use App\Models\Psychologist;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    public function test_testing_database_seeder_populates_default_data(): void
    {
        $this->assertDatabaseCount(Psychologist::class, 3);
        $this->assertDatabaseCount(Availability::class, 6);
        $this->assertDatabaseHas('clients', [
            'email_domain' => 'dkv.be',
        ]);
    }
}
