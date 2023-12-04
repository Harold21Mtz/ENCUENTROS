<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                'instruction_conference' => 'required|string|max:300',
                'instruction_description' => 'required|string|max:600',
                'instruction_aspects' => 'required|string|max:1100',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'instruction_conference' => 'required|string|max:300',
                'instruction_description' => 'required|string|max:600',
                'instruction_aspects' => 'required|string|max:1100',
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
            'instruction_conference.required' => 'El campo "Instrucciones para la Conferencia" es obligatorio.',
            'instruction_conference.string' => 'El campo "Instrucciones para la Conferencia" debe ser una cadena de caracteres.',
            'instruction_conference.max' => 'El campo "Instrucciones para la Conferencia" no puede tener más de :max caracteres.',

            'instruction_description.required' => 'El campo "Descripción de las Instrucciones" es obligatorio.',
            'instruction_description.string' => 'El campo "Descripción de las Instrucciones" debe ser una cadena de caracteres.',
            'instruction_description.max' => 'El campo "Descripción de las Instrucciones" no puede tener más de :max caracteres.',

            'instruction_aspects.required' => 'El campo "Aspectos de Instrucciones" es obligatorio.',
            'instruction_aspects.string' => 'El campo "Aspectos de Instrucciones" debe ser una cadena de caracteres.',
            'instruction_aspects.max' => 'El campo "Aspectos de Instrucciones" no puede tener más de :max caracteres.',

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
            'instruction_conference' => 'Instrucciones para la Conferencia',
            'instruction_description' => 'Descripción de las Instrucciones',
            'instruction_aspects' => 'Aspectos de Instrucciones',
            'registerBy' => 'Registrado por',
        ];
    }
}
