<?php

namespace App\Http\Requests\Front\Regesteration;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegesterationRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'r_reservations_username' => 'required|string|max:255',
            'r_reservations_lastname' => 'required|string|max:255' ,
            'r_reservations_email' => 'required|email|max:255',
            'r_reservations_phone' => 'required',
            'r_reservations_seats' => 'required|integer|min:1',
            'e_event_id' => 'required|integer|exists:events,id' ,
            'street' => 'required' ,
            'postal' => 'required' ,
            'ort' => 'required' ,

        ];
    }
}
