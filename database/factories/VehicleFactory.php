<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word,
            'brand' => $this->faker->word,
            'version' => $this->faker->word,
            'year' => $this->faker->year(),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
