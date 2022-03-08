<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outlet>
 */
class OutletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'outlet_name' => $this->faker->company(),
            'outlet_address' => $this->faker->address(),
            'outlet_phone' => $this->faker->phoneNumber(),
        ];
    }
}
