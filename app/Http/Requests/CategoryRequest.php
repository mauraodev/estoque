<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'min:5' => 'A quantidade mínima para esse campo :attribute é 5',
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute precisa ser um número',
        ];
    }
}
