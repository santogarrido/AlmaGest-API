<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => \App\Models\Article::all()->random()->id,
            'company_id' => \App\Models\Company::all()->random()->id,
            'price' => $this->faker->numberBetween(5,15),
            'stock' => $this->faker->numberBetween(1,100),
            'size' => $this->faker->numberBetween(1,15),
            'color_name' => fake()->colorName(),
            'weight' => $this->faker->numberBetween(1,20),
            'family_id' => \App\Models\Family::all()->random()->id,
        ];
    }
}
