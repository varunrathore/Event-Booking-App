<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Validation\ValidationException;

class BookingService
{
    public function createBooking(array $data)
    {
        $event = Event::findOrFail($data['event_id']);

        // Check if attendee has already booked the event
        if (Booking::where('event_id', $data['event_id'])->where('attendee_id', $data['attendee_id'])->exists()) {
            throw ValidationException::withMessages(['error' => 'Attendee has already booked this event']);
        }

        // Check if event capacity is full
        if (Booking::where('event_id', $event->id)->count() >= $event->capacity) {
            throw ValidationException::withMessages(['error' => 'Event is fully booked']);
        }

        // Create booking
        return Booking::create($data);
    }
}
