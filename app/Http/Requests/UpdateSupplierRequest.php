<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:suppliers,name,'.$this->route('supplier')->id.'|max:255',
            'place_origin' => 'nullable|string|max:255'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.unique' => 'El proveedor ya está registrado',
            'name.max' => 'Solo se permiten 50 caracteres',

            'place_origin.string' => 'El formato es incorrecto',
            'place_origin.max' => 'Solo se permiten 255 caracteres',
        ];
    }
}
