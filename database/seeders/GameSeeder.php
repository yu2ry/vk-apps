<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;
use App\Models\Game;

/**
 * Class GameSeeder
 * @package Database\Seeders
 */
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Social::all()->each(function (Social $social) {
            foreach (Game::getItems() as $item) {
                $game = Game::firstOrNew($item);
                $game->social()->associate($social);
                $game->save();
            }
        });
    }
}
