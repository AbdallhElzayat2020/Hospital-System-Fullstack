<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctors\Doctor>
 */
class DoctorFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'appointments' => fake()->randomElement(['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'phone' => fake()->phoneNumber(),
            'price' => fake()->numberBetween(100, 500),
        ];
    }
}
