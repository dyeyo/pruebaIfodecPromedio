<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'note1' => 'required|numeric',
            'note2' => 'required|numeric',
            'note3' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'El campo nombre es obligatorio',
            'note1.required' => 'El campo nota 1 es obligatorio',
            'note2.required' => 'El campo nota 2 es obligatorio',
            'note3.required' => 'El campo nota 3 es obligatorio',
            'note1.numeric' => 'El campo nota 1 solo permite numeros',
            'note2.numeric' => 'El campo nota 2 solo permite numeros',
            'note3.numeric' => 'El campo nota 3 solo permite numeros',
        ];
    }
}
