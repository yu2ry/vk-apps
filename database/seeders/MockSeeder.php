<?php

namespace Database\Seeders;

use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class MockSeeder
 * @package Database\Seeders
 */
class MockSeeder extends Seeder
{

    const VK_IDS = [
        '36765', '12676639', '16622006', '17157431',
        '22697595', '32070524', '36053375', '72969633',
        '83849627', '121780335', '123730550', '142899669',
        '250362666', '44730280', '127336130', '132139818',
        '145282998', '68883739', '260307236', '212933906',
        '195953475', '60811221', '6230628', '9534786',
        '14078140', '8493200', '165338142', '182729303',
        '223680140', '370908450', '380950053', '55180025',
        '89372728', '92409824', '154204487', '152470922'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (self::VK_IDS as $id) {
            $user = User::firstOrNew([
                User::FIELD_SOCIAL_TYPE_ID => Social::VK,
                User::FIELD_SOCIAL_ID => $id
            ]);
            $user->save();
        }
    }
}
