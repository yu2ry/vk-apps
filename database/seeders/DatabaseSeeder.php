<?php

namespace Database\Seeders;

use App\Models\AnimalLevel;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SocialSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(AnimalLevel::class);
    }
}
