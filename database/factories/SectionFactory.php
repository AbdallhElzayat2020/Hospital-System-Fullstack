<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Section::class;

    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'name' => fake()->unique()->randomElement([
                'قسم المخ والاعصاب',
                'قسم الجراحة',
                'قسم الاطفال',
                'قسم النساء والتوليد',
                'قسم العيون',
                'قسم الباطنة'
            ]),
            'description' => fake()->paragraph(),
        ];
    }
}
