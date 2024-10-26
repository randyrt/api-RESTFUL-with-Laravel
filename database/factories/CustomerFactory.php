<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default states.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->RandomElement(['individual', 'company']);
        $name = $type === 'individual' ? $this->faker->name() : $this->faker->company();
        return [
            'name' => $name,
            'type' => $type,
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postCode(),
            'user_id' => 1
        ];
    }
}

