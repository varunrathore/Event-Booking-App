<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendee;
use Faker\Factory as Faker;

class AttendeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Attendee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
