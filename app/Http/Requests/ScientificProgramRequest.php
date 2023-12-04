<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScientificProgramRequest extends FormRequest
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
                'name_program' => 'required|string|max:50',
                'date_presentation' => 'required|string|max:50',
                'hour_presentation' => 'required|string|max:300',
                'activity' => 'required|string|max:1100',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'name_program' => 'required|string|max:50',
                'date_presentation' => 'required|string|max:50',
                'hour_presentation' => 'required|string|max:300',
                'activity' => 'required|string|max:1100',
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
            'name_program.required' => 'El campo "Nombre del Programa" es obligatorio.',
            'name_program.string' => 'El campo "Nombre del Programa" debe ser una cadena de caracteres.',
            'name_program.max' => 'El campo "Nombre del Programa" no puede tener más de :max caracteres.',

            'date_presentation.required' => 'El campo "Fecha de Presentación" es obligatorio.',
            'date_presentation.string' => 'El campo "Fecha de Presentación" debe ser una cadena de caracteres.',
            'date_presentation.max' => 'El campo "Fecha de Presentación" no puede tener más de :max caracteres.',

            'hour_presentation.required' => 'El campo "Hora de Presentación" es obligatorio.',
            'hour_presentation.string' => 'El campo "Hora de Presentación" debe ser una cadena de caracteres.',
            'hour_presentation.max' => 'El campo "Hora de Presentación" no puede tener más de :max caracteres.',

            'activity.required' => 'El campo "Actividad" es obligatorio.',
            'activity.string' => 'El campo "Actividad" debe ser una cadena de caracteres.',
            'activity.max' => 'El campo "Actividad" no puede tener más de :max caracteres.',

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
            'name_program' => 'Nombre del Programa',
            'date_presentation' => 'Fecha de Presentación',
            'hour_presentation' => 'Hora de Presentación',
            'activity' => 'Actividad',
            'registerBy' => 'Registrado por',
        ];
    }
}
