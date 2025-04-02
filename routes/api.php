<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\BookingController;

Route::prefix('v1')->group(function () {
    // Events CRUD
    Route::apiResource('events', EventController::class);

    // Attendees CRUD
    Route::apiResource('attendees', AttendeeController::class);

    // Bookings
    Route::get('bookings', [BookingController::class, 'index']);
    Route::post('bookings', [BookingController::class, 'store']);
});
