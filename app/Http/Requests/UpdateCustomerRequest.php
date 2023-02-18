<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:500',
            'phone' => 'nullable|string|unique:customers,phone,'.$this->route('customer')->id.'|min:9|max:9',
            'dni' => 'required|string|unique:customers,dni,'.$this->route('customer')->id.'|min:8|max:8',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'adress.required' => 'Debe completar este campo',
            'adress.string' => 'El formato es incorrecto',
            'adress.max' => 'Solo se permiten 500 caracteres',

            'phone.string' => 'El formato es incorrecto',
            'phone.unique' => 'El teléfono ya está registrado',
            'phone.max' => 'Se requiere de 9 caracteres',
            'phone.max' => 'Solo se permiten 9 caracteres',

            'dni.required' => 'Debe completar este campo',
            'dni.string' => 'El formato es incorrecto',
            'dni.unique' => 'El DNI ya está registrado',
            'dni.min' => 'Se requiere de 8 caracteres',
            'dni.max' => 'Solo se permiten 8 caracteres',
        ];
    }
}
