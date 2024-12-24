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
            'file_name' => fake()->randomElement(['doctor1.jpg', 'doctor2.jpg', 'doctor3.jpg', 'doctor4.jpg', 'doctor5.jpg', 'doctor6.jpg', 'doctor7.jpg', 'doctor8.jpg', 'doctor9.jpg', 'doctor10.jpg', 'doctor11.jpg', 'doctor12.jpg', 'doctor13.jpg', 'doctor14.jpg', 'doctor15.jpg', 'doctor16.jpg', 'doctor17.jpg', 'doctor18.jpg', 'doctor19.jpg', 'doctor20.jpg', 'doctor21.jpg', 'doctor22.jpg', 'doctor23.jpg', 'doctor24.jpg', 'doctor25.jpg', 'doctor26.jpg', 'doctor27.jpg', 'doctor28.jpg', 'doctor29.jpg', 'doctor30.jpg']),
            'imageable_id' => Doctor::all()->random()->id,
            'imageable_type' => Doctor::class,
        ];
    }
}
