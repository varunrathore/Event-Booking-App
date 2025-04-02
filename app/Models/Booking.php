<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'attendee_id'];

    // Booking belongs to an event
    public function event() {
        return $this->belongsTo(Event::class);
    }

    // Booking belongs to an attendee
    public function attendee() {
        return $this->belongsTo(Attendee::class);
    }
}
