<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'modelo' => $this->faker->name,
            'marca' => $this->faker->name,
            'versao' => $this->faker->name,
            'year' => $this->faker->randomNumber(),
        ];
    }
}
