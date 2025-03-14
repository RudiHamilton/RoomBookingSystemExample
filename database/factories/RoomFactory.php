<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'type'=> fake()->lastName(),
            'capacity'=> fake()->randomNumber(2),
            'require_deposit'=> fake()->boolean(),
            'deposit_cost'=> fake()->randomDigit(),
        ];
    }
}
