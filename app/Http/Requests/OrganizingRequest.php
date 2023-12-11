<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizingRequest extends FormRequest
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
        $maxSize= 2048;
        if (request()->isMethod('post')) {
            return [
                'organizing_name' => 'required|string|max:50',
                'organizing_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'organizing_name' => 'required|string|max:50',
                'organizing_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
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
            'organizing_name.required' => 'El campo "Nombre de la Organización" es obligatorio.',
            'organizing_name.string' => 'El campo "Nombre de la Organización" debe ser una cadena de caracteres.',
            'organizing_name.max' => 'El campo "Nombre de la Organización" no puede tener más de :max caracteres.',

            'organizing_image.required' => 'La imagen de la organización es obligatoria.',
            'organizing_image.mimes' => 'La imagen de la organización debe ser de tipo: png, jpg.',
            'organizing_image.file' => 'La imagen de la organización debe ser un archivo.',
            'organizing_image.max' => 'La imagen de la organización no puede ser mayor de :max kilobytes.',

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
            'organizing_name' => 'Nombre de la Organización',
            'organizing_image' => 'Imagen de la Organización',
            'registerBy' => 'Registrado por',
        ];
    }
}
