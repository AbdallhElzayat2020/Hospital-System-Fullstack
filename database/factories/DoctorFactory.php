<?php

namespace Database\Factories;

use App;
use App\Models\Doctors\Doctor;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            // 'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'price' => fake()->randomElement([100,200,300,400,500]),
        ];
    }
}
