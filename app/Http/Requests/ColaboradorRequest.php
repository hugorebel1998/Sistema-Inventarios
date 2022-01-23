<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
            'estatus' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'dirección' => 'required',
            'fecha_nacimiento' => 'required',
            'correo_electrónico' => 'required|email|unique:collaborators,email',
        ];
    }
}
