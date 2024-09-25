<?php

namespace App\Http\Requests\Api\Question;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreQuestionRequest extends FormRequest
{
    use ResponseJson;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'  => 'sometimes|exists:categories,id',
             'details'      => 'required|max:5000',
        ];
    }

    public function messages() {
        return [
            'category_id.required' => __('the_category_id_field_is_required'),
            'category_id.exists' => __('the_selected_category_is_invalid'),
            'details.required' => __('the_details_field_is_required'),
            'details.string' => __('the_details_must_be_a_string'),
            'details.max' => __('the_details_may_not_be_greater_than_:max_characters', ['max' => 2000]),
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }
}
