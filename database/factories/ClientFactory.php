<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'provider_id' => User::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->e164PhoneNumber(),
            'date_of_birth' => $this->faker->date(),
        ];
    }
}
