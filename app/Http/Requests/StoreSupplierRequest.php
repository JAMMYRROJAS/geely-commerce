<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|unique:suppliers|max:255',
            'place_origin' => 'nullable|string|max:255'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.unique' => 'El proveedor ya está registrado',
            'name.max' => 'Solo se permiten 255 caracteres',

            'place_origin.string' => 'El formato es incorrecto',
            'place_origin.max' => 'Solo se permiten 255 caracteres',
        ];
    }
}
