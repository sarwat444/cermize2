<?php

namespace App\Http\Requests\Panel\events;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'e_events_name' => 'required|string|max:255',
            'e_events_date' => 'required|date',
            'e_events_from' => 'required',
            'e_events_to' => 'required',
            'e_events_available' => 'required|integer|min:0',
            'e_events_status' => 'required|boolean',
            'e_events_description' => 'nullable|string|max:5000',
        ];
    }
}
