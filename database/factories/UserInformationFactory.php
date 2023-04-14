<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInformation>
 */
class UserInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'sex' => rand(0, 1),
            'birthday' => $this->faker->date(),
            'description' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'image' => 'https://source.unsplash.com/random/640x480'
        ];
    }
}
