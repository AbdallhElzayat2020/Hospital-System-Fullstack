<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Doctor::factory(30)->create();

        //    Doctor::factory(30)->create();
//       Doctor::updateOrCreate(
//        [
//            'email' => fake()->unique()->safeEmail(),
//            'name' => fake()->name(),
//            'appointments'=>fake()->randomElement(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']),
//            'email_verified_at' => now(),
//            'password' => Hash::make('password'),
//            'phone' => fake()->phoneNumber(),
//            'price' => fake()->randomElement([100,200,300,400,500]),
//        ]
//    );

    }
}
