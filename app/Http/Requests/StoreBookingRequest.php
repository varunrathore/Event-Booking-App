<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event_id' => 'required|exists:events,id',
            'attendee_id' => 'required|exists:attendees,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
