<?php

namespace Database\Seeders;

use App\Models\AnimalLevel;
use Illuminate\Database\Seeder;

/**
 * Class AnimalLevelSeeder
 * @package Database\Seeders
 */
class AnimalLevelSeeder extends Seeder
{

    const COMPLEXITY_STEP_1 = 5;
    const COMPLEXITY_STEP_2 = 7;
    const COMPLEXITY_STEP_3 = 6;
    const COMPLEXITY_STEP_4 = 9;

    const COMPLEXITY = [
        self::COMPLEXITY_STEP_1 => 1,
        self::COMPLEXITY_STEP_2 => 2,
        self::COMPLEXITY_STEP_3 => 3,
        self::COMPLEXITY_STEP_4 => 4
    ];

    const COUNT_SPACE = 80;

    const COUNT_SPACES = [
        self::COMPLEXITY_STEP_1 => 30,
        self::COMPLEXITY_STEP_2 => 40,
        self::COMPLEXITY_STEP_3 => 60,
        self::COMPLEXITY_STEP_4 => 69
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $level = 0;
        foreach (self::COMPLEXITY as $key => $value) {
            for($i = 1; $i <= $key; $i++) {
                $model = AnimalLevel::firstOrNew([
                    AnimalLevel::FIELD_LEVEL_ID => ++$level,
                    AnimalLevel::FIELD_COUNT => $value,
                    AnimalLevel::FIELD_COUNT_SPACE => self::COUNT_SPACE - ($i + self::COUNT_SPACES[$key])
                ]);
                $model->save();
            }
        }
    }
}
