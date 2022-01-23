<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'perfil' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'correo_electrónico' => 'required|email|unique:users,email',
            'contraseña' => 'min:8|required_with:confirmar_contraseña|same:confirmar_contraseña',
            'confirmar_contraseña' => 'required|min:8',        
        ];
    }
}
