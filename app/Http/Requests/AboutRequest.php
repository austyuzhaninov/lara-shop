<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'phone' => ['nullable', 'string'],
            'email' => ['required', 'string', 'min:5', 'max:100'],
            'message' => ['required', 'min:10', 'max:600'],
        ];
    }
}
