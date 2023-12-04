<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ];
        }
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Ingresa una dirección de correo electrónico válida.',
            'subject.required' => 'El campo asunto es obligatorio.',
            'subject.string' => 'El campo asunto debe ser una cadena de texto.',
            'message.required' => 'El campo mensaje es obligatorio.',
            'message.string' => 'El campo mensaje debe ser una cadena de texto.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nombre',
            'email' => 'Correo Electrónico',
            'subject' => 'Asunto',
            'message' => 'Mensaje',
        ];
    }
}
