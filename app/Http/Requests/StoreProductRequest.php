<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:products|max:255',
            'large_description' => 'nullable|string|max:500',
            'small_description' => 'nullable|string|max:255',
            'sell_price' => 'required',
        ];  
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.unique' => 'El producto ya está registrado',
            'name.max' => 'Solo se permiten 255 caracteres',

            'large_description.string' => 'El formato es incorrecto',
            'large_description.max' => 'Solo se permiten 500 caracteres',
            'small_description.string' => 'El formato es incorrecto',
            'small_description.max' => 'Solo se permiten 255 caracteres',

            'sell_price.required' => 'Debe completar este campo',           
        ];
    }
}
