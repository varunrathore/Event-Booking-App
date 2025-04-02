<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'bookings')
                    ->withTimestamps();
    }
}
