<?php

namespace App\Http\Requests\Panel\events;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultiEvents extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'e_events_name' => 'required|string|max:255',
            'days' => 'required',
            'start' => 'required',
            'number_of_weeks' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'e_events_available' => 'required|integer|min:1',
            'e_events_status' => 'nullable',
            'e_events_description' => 'required'
        ];
    }
}
