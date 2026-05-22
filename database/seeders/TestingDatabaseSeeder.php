<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestingDatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's testing database.
     */
    public function run(): void
    {
        $this->call(DatabaseSeeder::class);
    }
}
