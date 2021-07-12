<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;

/**
 * Class SocialSeeder
 * @package Database\Seeders
 */
class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Social::getSocials() as $social) {
            $model = Social::firstOrNew($social);
            $model->save();
        }
    }
}
