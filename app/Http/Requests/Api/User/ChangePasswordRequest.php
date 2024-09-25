<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;


class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'old_password.required' => __('old_password_required'),
            'password.required'     => __('password_required'),
            'password.min'          => __('password_min', ['min' => 8])
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }
}
