<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;

class RegisterRequest extends FormRequest
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
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'         => ['required',Rule::unique('users', 'email')->where(function ($query) {
                $query->where('is_validation' , 1);
            })],
           // 'code_country' => 'nullable|string|max:50',
            'mobile'       => 'nullable|string|max:50',
            'password'     => 'required|string|min:8',
          //  'country_id'   => 'required|integer',
          //  'city'         => 'nullable|string|max:255',
          //  'plz_code'     => 'nullable|string|max:50',
          //  'street'       => 'nullable|string|max:255',
            'gender'       => 'required|in:male,female',
        ];
    }

    public function messages() {
        return [
            'first_name.required' => __('first_name_required'),
            'first_name.string' => __('first_name_string'),
            'first_name.max' => __('first_name_max', ['max' => 255]),
            'last_name.required' => __('last_name_required'),
            'last_name.string' => __('last_name_string'),
            'last_name.max' => __('last_name_max', ['max' => 255]),
            'email.required' => __('email_required'),
            'email.unique' => __('email_unique'),
            'email.exists' => __('email_exists'),
            'code_country.string' => __('code_country_string'),
            'code_country.max' => __('code_country_max', ['max' => 50]),
            'mobile.string' => __('mobile_string'),
            'mobile.max' => __('mobile_max', ['max' => 50]),
            'password.required' => __('password_required'),
            'password.string' => __('password_string'),
            'password.min' => __('password_min', ['min' => 8]),
            'country_id.required' => __('country_id_required'),
            'country_id.integer' => __('country_id_integer'),
            'city.string' => __('city_string'),
            'city.max' => __('city_max', ['max' => 255]),
            'plz_code.string' => __('plz_code_string'),
            'plz_code.max' => __('plz_code_max', ['max' => 50]),
            'street.string' => __('street_string'),
            'street.max' => __('street_max', ['max' => 255]),
            'gender.required' => __('gender_required'),
            'gender.in' => __('gender_in')
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }


}
