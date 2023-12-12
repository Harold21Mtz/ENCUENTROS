<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        if (request()->isMethod('post')) {
            return [
                'description_one' => 'required|string|max:500',
                'description_two' => 'required|string|max:500',
                'ufpso_student' => 'required|string|max:20',
                'ufpso_graduate' => 'required|string|max:20',
                'external_professional' => 'required|string|max:20',
                'oral_presenter' => 'required|string|max:20',
                'description_three' => 'required|string|max:120',
                'message' => 'required|string|max:80',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'description_one' => 'required|string|max:500',
                'description_two' => 'required|string|max:500',
                'ufpso_student' => 'required|string|max:20',
                'ufpso_graduate' => 'required|string|max:20',
                'external_professional' => 'required|string|max:20',
                'oral_presenter' => 'required|string|max:20',
                'description_three' => 'required|string|max:120',
                'message' => 'required|string|max:80',
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
            'description_one.required' => 'El campo "Descripción Uno" es obligatorio.',
            'description_one.string' => 'El campo "Descripción Uno" debe ser una cadena de caracteres.',
            'description_one.max' => 'El campo "Descripción Uno" no puede tener más de :max caracteres.',

            'description_two.required' => 'El campo "Descripción Dos" es obligatorio.',
            'description_two.string' => 'El campo "Descripción Dos" debe ser una cadena de caracteres.',
            'description_two.max' => 'El campo "Descripción Dos" no puede tener más de :max caracteres.',

            'ufpso_student.required' => 'El campo "Ufpso Estudiante" es obligatorio.',
            'ufpso_student.string' => 'El campo "Ufpso Estudiante" debe ser una cadena de caracteres.',
            'ufpso_student.max' => 'El campo "Ufpso Estudiante" no puede tener más de :max caracteres.',
            
            'ufpso_graduate.required' => 'El campo "Ufpso Graduado" es obligatorio.',
            'ufpso_graduate.string' => 'El campo "Ufpso Graduado" debe ser una cadena de caracteres.',
            'ufpso_graduate.max' => 'El campo "Ufpso Graduado" no puede tener más de :max caracteres.',

            'external_professional.required' => 'El campo "Profesional externo" es obligatorio.',
            'external_professional.string' => 'El campo "Profesional externo" debe ser una cadena de caracteres.',
            'external_professional.max' => 'El campo "Profesional externo" no puede tener más de :max caracteres.',

            'oral_presenter.required' => 'El campo "Presentador oral" es obligatorio.',
            'oral_presenter.string' => 'El campo "Presentador oral" debe ser una cadena de caracteres.',
            'oral_presenter.max' => 'El campo "Presentador oral" no puede tener más de :max caracteres.',

            'message.required' => 'El campo "Mensaje" es obligatorio.',
            'message.string' => 'El campo "Mensaje',
            'message.max' => 'El campo "Profesional externo" no puede tener más de :max caracteres.',

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
            'description_one' => 'Descripción Uno',
            'description_two' => 'Descripción Dos',
            'ufpso_student' => 'Ufpso Estudiante',
            'ufpso_graduate' => 'Ufpso Graduado',
            'external_professional' => 'Profesional Externo',
            'oral_presenter' => 'Presentador Oral',
            'description_three' => 'Descripción Tres',
            'message' => 'Mensaje',
            'registerBy' => 'Registrado por',
        ];
    }
}
