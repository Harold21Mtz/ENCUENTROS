<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScientificCommiteeIRequest extends FormRequest
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
                'scientific_name' => 'required|string|max:50',
                'scientific_title' => 'required|string|max:10',
                'scientific_university' => 'required|string|max:100',
                'scientific_description' => 'required|string|max:400',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'scientific_name' => 'required|string|max:50',
                'scientific_title' => 'required|string|max:10',
                'scientific_university' => 'required|string|max:100',
                'scientific_description' => 'required|string|max:400',
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

            'scientific_name.required' => 'El campo "Nombre del Comité Científico" es obligatorio.',
            'scientific_name.string' => 'El campo "Nombre del Comité Científico" debe ser una cadena de caracteres.',
            'scientific_name.max' => 'El campo "Nombre del Comité Científico" no puede tener más de :max caracteres.',

            'scientific_title.required' => 'El campo "Título del Comité Científico" es obligatorio.',
            'scientific_title.string' => 'El campo "Título del Comité Científico" debe ser una cadena de caracteres.',
            'scientific_title.max' => 'El campo "Título del Comité Científico" no puede tener más de :max caracteres.',

            'scientific_university.required' => 'El campo "Universidad del Comité Científico" es obligatorio.',
            'scientific_university.string' => 'El campo "Universidad del Comité Científico" debe ser una cadena de caracteres.',
            'scientific_university.max' => 'El campo "Universidad del Comité Científico" no puede tener más de :max caracteres.',

            'scientific_description.required' => 'El campo "Descripción del Comité Científico" es obligatorio.',
            'scientific_description.string' => 'El campo "Descripción del Comité Científico" debe ser una cadena de caracteres.',
            'scientific_description.max' => 'El campo "Descripción del Comité Científico" no puede tener más de :max caracteres.',

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
            'scientific_name' => 'Nombre del Comité Científico',
            'scientific_title' => 'Título del Comité Científico',
            'scientific_university' => 'Universidad del Comité Científico',
            'scientific_description' => 'Descripción del Comité Científico',
            'registerBy' => 'Registrado por',
        ];
    }
}
