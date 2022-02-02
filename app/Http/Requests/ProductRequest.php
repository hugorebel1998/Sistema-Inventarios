<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nombre' => 'required',
            'descripción' => 'required',
            'categoria' => 'required',
            'unidad' => 'required',
            'costo' => 'required',
            'precio_venta' => 'required',
            'existencia' => 'required',
            'nivel_existencia' => 'required'
        ];
    }
}
