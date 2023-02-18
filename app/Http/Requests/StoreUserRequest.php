<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'min:8',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.max' => 'Solo se permiten 150 caracteres',
            
            'email.required' => 'Debe completar este campo',
            'email.email' => 'No es un email',
            'email.string' => 'El formato es incorrecto',
            'email.max' => 'Solo se permiten 150 caracteres',
            'email.unique' => 'El email ya fue registrado',

            'password.min' => 'Debe contener al menos 8 caracteres',
        ];
    }
}
