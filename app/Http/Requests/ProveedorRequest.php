<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'apellidos' => 'required',
            'correo_electrónico' => 'required|email|unique:suppliers,email',
            'telefono_1' => 'required',
            // 'telefono_2' => 'required',
            'calle' => 'required',
            'numero_int' => 'required',
            'numero_ext' => 'required',
            'colonia' => 'required',
            'municipio' => 'required'
        ];
    }
}
