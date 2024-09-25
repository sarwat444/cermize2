<?php

namespace App\Http\Requests\Panel\orders;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ResponseJson;
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
            'r_reservations_email'    => 'required|email|max:255',
            'r_reservations_phone'    => 'required|string|max:20',
            'r_reservations_seats'    => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'r_reservations_username.required' => __('Der Benutzername ist erforderlich.'),
            'r_reservations_username.string'   => __('Der Benutzername muss ein Text sein.'),
            'r_reservations_username.max'      => __('Der Benutzername darf nicht länger als :max Zeichen sein.'),

            'r_reservations_email.required'    => __('Die E-Mail-Adresse ist erforderlich.'),
            'r_reservations_email.email'       => __('Die E-Mail-Adresse muss gültig sein.'),
            'r_reservations_email.max'         => __('Die E-Mail-Adresse darf nicht länger als :max Zeichen sein.'),

            'r_reservations_phone.required'    => __('Die Telefonnummer ist erforderlich.'),
            'r_reservations_phone.string'      => __('Die Telefonnummer muss ein Text sein.'),
            'r_reservations_phone.max'         => __('Die Telefonnummer darf nicht länger als :max Zeichen sein.'),

            'r_reservations_seats.required'    => __('Die Anzahl der Sitzplätze ist erforderlich.'),
            'r_reservations_seats.integer'     => __('Die Anzahl der Sitzplätze muss eine Ganzzahl sein.'),
            'r_reservations_seats.min'         => __('Die Anzahl der Sitzplätze muss mindestens :min betragen.'),
        ];
    }

}
