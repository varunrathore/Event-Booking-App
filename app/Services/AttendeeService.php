<?php

namespace App\Services;

use App\Models\Attendee;

class AttendeeService
{
    public function getAllAttendees()
    {
        return Attendee::all();
    }

    public function createAttendee(array $data)
    {
        return Attendee::create($data);
    }

    public function updateAttendee(Attendee $attendee, array $data)
    {
        $attendee->update($data);
        return $attendee;
    }

    public function deleteAttendee(Attendee $attendee)
    {
        $attendee->delete();
    }
}
