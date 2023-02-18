<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name,'.$this->route('category')->id.'|max:50',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe completar este campo',
            'name.string' => 'El formato es incorrecto',
            'name.unique' => 'La categoría ya está registrada',
            'name.max' => 'Solo se permiten 50 caracteres',
            
            'description.string' => 'El formato es incorrecto',
            'description.max' => 'Solo se permiten 255 caracteres',
        ];
    }
}
