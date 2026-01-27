<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name'=>fake()->company(),
        'address'=>fake()->streetAddress(),
        'city'=>fake()->city(),
        'cif'=>strtoupper(fake()->bothify('?########')),
        'email'=>fake()->unique()->companyEmail(),
        'phone'=>fake()->numerify('#########'),
        'del_term_id'=>\App\Models\DeliveryTerm::all()->random()->id,
        'transport_id'=>\App\Models\Transport::all()->random()->id,
        'payment_term_id'=>\App\Models\PaymentTerm::all()->random()->id,
        'bank_entity_id'=>\App\Models\BankEntity::all()->random()->id,
        'discount_id'=>\App\Models\Discount::all()->random()->id
        ];
    }
}
