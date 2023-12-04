<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:providers',
            'ruc_number'=>'required|string|max:15|min:10|unique:providers',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|max:15|min:10|unique:providers',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 caracteres',

            'email.required'=>'Este campo es requerido',
            'email.email'=>'Este campo no es un correo electrónico',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 255 caracteres',
            'email.unique'=>'Ya se encuentra registrado',


            'ruc_number.required'=>'Este campo es requerido',
            'ruc_number.string'=>'El valor no es correcto',
            'ruc_number.max'=>'Solo se permiten 11 caracteres',
            'ruc_number.min'=>'Se requiere de 11 caracteres',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 255 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permite 15 caracteres',
            'phone.min'=>'Solo se permite 10 caracteres',
            'phone.unique'=>'Ya se encuentra registrado'
        ];
    }
}

