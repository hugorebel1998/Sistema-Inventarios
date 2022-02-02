<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'tipo_documento' => 'required',
            'dirección' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'correo_electrónico' => 'required|email|unique:customers,email',
        ];
    }
}
