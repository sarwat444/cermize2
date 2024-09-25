<?php

namespace App\Http\Requests\Api\AlternativeMedicine;

use App\Traits\ResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AlternativeMedicineRequest extends FormRequest
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
            'doctor_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'doctor_id.required'      => __('The_doctor_ID_field_is_required.'),
            'doctor_id.exists'        => __('The_selected_doctor_ID_is_invalid.'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }


}
