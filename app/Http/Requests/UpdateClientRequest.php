<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'string|required|max:255',
            'ine'=>'string|required|unique:clients,ine,'.$this->route('client')->id.'|max:13|min:8',
            'rfc'=>'string|nullable|unique:clients,rfc,'.$this->route('client')->id.'|max:13|min:8',
            'address'=>'string|nullable|max:255',
            'phone'=>'string|nullable|unique:clients,phone,'.$this->route('client')->id.'|max:15',
            'email'=>'string|nullable|unique:clients,email,'.$this->route('client')->id.'|max:255,name|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'ine.string' => 'El valor no es correcto',
            'ine.required' => 'Este campo es requerido',
            'ine.unique' => 'Este INE ya se encuentra registrado',
            'ine.min' => 'Se requiere de 13 caracteres',
            'ine.max' => 'Solo se permiten 13 caracteres',

            'rfc.string' => 'El valor no es corecto',
            'rfc.unique' => 'El número de RFC ya se encuentra registrado',
            'rfc.min' => 'Se requiere de 13 caracteres',
            'rfc.max' => 'Solo se permiten 13 caracteres',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'Solo se permiten 255 caracteres',

            'phone.string' => 'El valor no es correcto',
            'phone.unique' => 'El número ya se encuentra registrado',
            'phone.min' => 'Se requieren mínimo 10 caracteres',
            'phone.max' => 'Solo se permiten 15 caracteres máximo',

            'email.string' => 'El valor no es correcto',
            'email.unique' => 'La dirección de correo electrónico ya se encuentra registrada',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.email' => 'No es un correo electrónico',
        ];
    }
}
