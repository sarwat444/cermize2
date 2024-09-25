<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;

class LoginRequest extends FormRequest
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
            'email_or_phone' => 'required',
            'password'       => 'required',
            'code_country'   => 'nullable'
        ];
    }

    public function messages() {
        return [
            'email_or_phone.required' => __('email_or_phone_required'),
            'password.required'       => __('password_required'),
        ];
    }


    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }
}
