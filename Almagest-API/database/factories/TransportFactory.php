<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $min = fake()->numberBetween(1, 100);
        return [
            'min'=> $min,
            'max'=> fake()->numberBetween($min, 10000),
            'price'=>fake()->numberBetween(0, 10000)
        ];
    }
}
