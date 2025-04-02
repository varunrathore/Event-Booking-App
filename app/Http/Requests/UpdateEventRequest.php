<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'date' => 'sometimes|date',
            'capacity' => 'sometimes|integer|min:1',
            'country' => 'sometimes|string|max:100'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
