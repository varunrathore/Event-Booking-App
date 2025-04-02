<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Attendee;
use Faker\Factory as Faker;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $events = Event::pluck('id')->toArray();
        $attendees = Attendee::pluck('id')->toArray();

        if (empty($events) || empty($attendees)) {
            $this->command->info('No events or attendees found. Please seed them first.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Booking::create([
                'event_id' => $faker->randomElement($events),
                'attendee_id' => $faker->randomElement($attendees),
            ]);
        }
    }
}
