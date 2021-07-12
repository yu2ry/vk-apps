<?php

namespace Database\Factories;

use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserFactory
 * @package Database\Factories
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            User::FIELD_SOCIAL_TYPE_ID => Social::count(),
            User::FIELD_SOCIAL_ID => $this->faker->randomNumber()
        ];
    }
}
