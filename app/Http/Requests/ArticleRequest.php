<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'head' => ['required', 'string', 'min:2', 'max:100'],
            'text' => ['required', 'string', 'min:2', 'max:400'],
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
            'head' => 'Заголовок статьи',
            'text' => 'Текст статьи',
        ];
    }


}
