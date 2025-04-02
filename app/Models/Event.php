<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date', 'capacity', 'country'];

    // One event can have many bookings
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    // Many-to-Many Relationship: An event has many attendees through bookings
    public function attendees() {
        return $this->belongsToMany(Attendee::class, 'bookings')
                    ->withTimestamps();
    }
}
