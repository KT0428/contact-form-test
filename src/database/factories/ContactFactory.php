<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->numerify('0#0########'),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->secondaryAddress(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'detail' => $this->faker->realText(100),
        ];
    }
}