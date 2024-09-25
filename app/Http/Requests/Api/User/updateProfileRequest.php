<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;
class updateProfileRequest extends FormRequest
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
            })->ignore(auth()->guard('api')->user()->id)],
            'mobile'       => 'nullable|string|max:50',
            'password'     => 'nullable|string|min:8',
            'gender'       => 'required|in:male,female',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif'
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
            'mobile.string' => __('mobile_string'),
            'mobile.max' => __('mobile_max', ['max' => 50]),
            'password.required' => __('password_required'),
            'password.string' => __('password_string'),
            'password.min' => __('password_min', ['min' => 8]),
            'gender.required' => __('gender_required'),
            'gender.in' => __('gender_in')
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }
}
