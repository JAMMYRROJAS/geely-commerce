<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:products,name,'.$this->route('product')->id.'|max:255',
            'large_description' => 'nullable|string|max:500',
            'small_description' => 'nullable|string|max:255',
            'sell_price' => 'required',
            'category_id' => 'integer|required|exists:App\Models\Category,id',
            'supplier_id' => 'integer|required|exists:App\Models\Supplier,id',
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

            'category_id.integer' => 'Debe completar este campo',
            'category_id.required' => 'Debe completar este campo',
            'category_id.exists' => 'La categoría no existe',
            'supplier_id.integer' => 'Debe completar este campo',
            'supplier_id.required' => 'Debe completar este campo',
            'supplier_id.exists' => 'El proveedor no existe',
        ];
    }
}
