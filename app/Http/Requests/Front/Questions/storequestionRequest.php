<?php

namespace App\Http\Requests\Front\Questions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseJson;

class storequestionRequest extends FormRequest
{
    use ResponseJson;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'  => 'required',
            'details'      => 'required|max:5000',
        ];
    }
    public function messages() {
        return [
            'category_id.required' => __('the_category_id_field_is_required'),
            'details.required' => __('the_details_field_is_required'),
            'details.string' => __('the_details_must_be_a_string'),
            'details.max' => __('the_details_may_not_be_greater_than_:max_characters', ['max' => 2000]),
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }

}
