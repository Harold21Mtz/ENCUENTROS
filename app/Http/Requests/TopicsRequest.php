<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicsRequest extends FormRequest
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
     * @return string[]|null
     */
    public function rules(): ?array
    {
        if (request()->isMethod('post')) {
            return [
                'program_name' => 'required|string|max:50',
                'program_description' => 'nullable|string|max:100',
                'program_topics' => 'required|string|max:2000',
                'program_image' => 'required|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'program_name' => 'required|string|max:50',
                'program_description' => 'nullable|string|max:100',
                'program_topics' => 'required|string|max:2000',
                'program_image' => 'sometimes|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    /**
     * Get custom error messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'max' => [
                'string' => 'El campo :attribute no debe ser mayor de :max caracteres.',
                'file' => 'El campo :attribute no debe ser mayor de :max kilobytes.',
            ],
            'email' => 'El formato del campo :attribute no es válido.',
            'mimes' => 'El campo :attribute debe ser de tipo PNG o JPG.',
            'file' => 'El campo :attribute debe ser un archivo.',
        ];
    }

    /**
     * Get custom attribute names for validation.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'program_name' => 'Nombre del Programa',
            'program_description' => 'Descripción del Programa',
            'program_topics' => 'Topicos del Programa',
            'program_image' => 'Imagen Principal del Programa',
            'registerBy' => 'Registrado por',
        ];
    }
}
