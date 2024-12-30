<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Image::class;
    public function definition(): array
    {
        return [
            'filename' => fake()->randomElement(['doctor1.jpg', 'doctor2.jpg']),
            'imageable_id' => Doctor::all()->random()->id,
            'imageable_type' => Doctor::class,
        ];
    }
}
