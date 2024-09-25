<?php

namespace App\Http\Requests\Api\Order;

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
            'country_id'    => 'required|exists:countries,id',
            'order'         => 'required|max:5000',
            'city'          => 'required|string|max:100',
            'plz_code'      => 'nullable|max:50',
            'street'        => 'nullable|max:500',
            'whats_number'  => 'required|max:50',
        ];
    }

    public function messages() {
        return [
            'country_id.required' => __('The_country_ID_field_is_required.'),
            'country_id.exists' => __('The_selected_country_is_invalid.'),
            'order.required' => __('The_order_field_is_required.'),
            'order.max' => __('The_order_may_not_be_greater_than_:max.'),
            'city.required' => __('The_city_field_is_required.'),
            'city.string' => __('The_city_must_be_a_string.'),
            'city.max' => __('The_city_may_not_be_greater_than_:max_characters.'),
            'plz_code.required' => __('The_PLZ_code_field_is_required.'),
            'plz_code.max' => __('The_PLZ_code_may_not_be_greater_than_:max_characters.'),
            'street.required' => __('The_street_field_is_required.'),
            'street.max' => __('The_street_may_not_be_greater_than_:max_characters.'),
            'whats_number.required' => __('The_WhatsApp_number_field_is_required.'),
            'whats_number.max' => __('The_WhatsApp_number_may_not_be_greater_than_:max_characters.'),
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->sendError('Validation Error.', $validator->errors()->first()));
    }
}
