<?php

namespace App\Http\Requests\Panel\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
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
            'mobile'                    => 'nullable|string|min:5|max:20',
            'first_name'                => 'required|string|min:3|max:255',
            'last_name'                 => 'required|string|min:3|max:255',
            'email'                     => 'required|email|max:50',
            'ort'                       => 'required' ,
            'postal'                       => 'required' ,
            'street'                       => 'required' ,
        ];
    }
}
