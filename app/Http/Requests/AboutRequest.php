<?php

namespace App\Http\Requests;

use App\Rules\Phone;
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
            'phone' => ['nullable', 'string', new Phone],
            'email' => ['required', 'string', 'min:5', 'max:100'],
            'message' => ['required', 'min:10', 'max:600'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Параметр :attribute является обязательным!',
            'min' => 'Минимальная длинна параметра :attribute является :min символов.',
            'max' => 'Максимальная длинна параметра :attribute является :max символов.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Номер телефона',
            'email' => 'E-mail',
            'message' => 'Текст сообщения',
        ];
    }

}
