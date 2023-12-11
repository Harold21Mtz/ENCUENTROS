<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizingCommiteeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>|null
     */
    public function rules(): ?array
    {
        if (request()->isMethod('post')) {
            return [
                'organizer_charge' => 'required|string|max:50',
                'organizer_name' => 'required|string|max:50',
                'organizer_title' => 'required|string|max:10',
                'organizer_university' => 'required|string|max:100',
                'organizer_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'organizer_charge' => 'required|string|max:50',
                'organizer_name' => 'required|string|max:50',
                'organizer_title' => 'required|string|max:10',
                'organizer_university' => 'required|string|max:100',
                'organizer_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    
    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'organizer_charge.required' => 'El campo "Cargo del Organizador" es obligatorio.',
            'organizer_charge.string' => 'El campo "Cargo del Organizador" debe ser una cadena de caracteres.',
            'organizer_charge.max' => 'El campo "Cargo del Organizador" no puede tener más de :max caracteres.',

            'organizer_name.required' => 'El campo "Nombre del Organizador" es obligatorio.',
            'organizer_name.string' => 'El campo "Nombre del Organizador" debe ser una cadena de caracteres.',
            'organizer_name.max' => 'El campo "Nombre del Organizador" no puede tener más de :max caracteres.',

            'organizer_title.required' => 'El campo "Título del Organizador" es obligatorio.',
            'organizer_title.string' => 'El campo "Título del Organizador" debe ser una cadena de caracteres.',
            'organizer_title.max' => 'El campo "Título del Organizador" no puede tener más de :max caracteres.',

            'organizer_university.required' => 'El campo "Universidad del Organizador" es obligatorio.',
            'organizer_university.string' => 'El campo "Universidad del Organizador" debe ser una cadena de caracteres.',
            'organizer_university.max' => 'El campo "Universidad del Organizador" no puede tener más de :max caracteres.',

            'organizer_description.required' => 'El campo "Descripción del Organizador" es obligatorio.',
            'organizer_description.string' => 'El campo "Descripción del Organizador" debe ser una cadena de caracteres.',
            'organizer_description.max' => 'El campo "Descripción del Organizador" no puede tener más de :max caracteres.',

            'registerBy.required' => 'El campo "Registrado por" es obligatorio.',
            'registerBy.string' => 'El campo "Registrado por" debe ser una cadena de caracteres.',
            'registerBy.max' => 'El campo "Registrado por" no puede tener más de :max caracteres.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'organizer_charge' => 'Cargo del Organizador',
            'organizer_name' => 'Nombre del Organizador',
            'organizer_title' => 'Título del Organizador',
            'organizer_university' => 'Universidad del Organizador',
            'organizer_description' => 'Descripción del Organizador',
            'registerBy' => 'Registrado por',
        ];
    }
}
