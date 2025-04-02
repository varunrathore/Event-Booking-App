<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'country' => 'required|string|max:100'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
