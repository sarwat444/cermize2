<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;
class UpdateUserDataRequest extends FormRequest
{
    use ResponseJson;
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'password' => 'nullable|string|min:8',
            'state' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'mobile' => 'required|string|max:20',
            'plz_code' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'gender' => 'required',
            'code_country' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('The first name field is required.'),
            'first_name.string' => __('The first name must be a string.'),
            'first_name.max' => __('The first name may not be greater than :max characters.'),

            'last_name.required' => __('The last name field is required.'),
            'last_name.string' => __('The last name must be a string.'),
            'last_name.max' => __('The last name may not be greater than :max characters.'),

            'email.required' => __('The email field is required.'),
            'email.email' => __('The email must be a valid email address.'),
            'email.unique' => __('The email has already been taken.'),

            'password.string' => __('The password must be a string.'),
            'password.min' => __('The password must be at least :min characters.'),

            'state.string' => __('The state must be a string.'),
            'state.max' => __('The state may not be greater than :max characters.'),

            'country_id.required' => __('The country ID field is required.'),
            'country_id.exists' => __('The selected country is invalid.'),

            'mobile.required' => __('The mobile field is required.'),
            'mobile.string' => __('The mobile must be a string.'),
            'mobile.max' => __('The mobile may not be greater than :max characters.'),

            'plz_code.string' => __('The PLZ code must be a string.'),
            'plz_code.max' => __('The PLZ code may not be greater than :max characters.'),

            'street.string' => __('The street must be a string.'),
            'street.max' => __('The street may not be greater than :max characters.'),

            'gender.required' => __('The gender field is required.'),

            'code_country.required' => __('The code country field is required.'),
        ];
}
    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }

}
