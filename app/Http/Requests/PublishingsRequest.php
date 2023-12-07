<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishingsRequest extends FormRequest
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
        $maxSize = 2048;
        if (request()->isMethod('post')) {
            return [
                'name_journal' => 'required|string|max:50',
                'image_journal' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'link_journal' => 'nullable|string|max:150',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'name_journal' => 'required|string|max:50',
                'image_journal' => "sometimes|mimes:png,jpg|file|max:{$maxSize}",
                'link_journal' => 'nullable|string|max:150',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    public function messages(): array
    {
        return [
            'name_journal.required' => 'El nombre del diario es obligatorio.',
            'name_journal.string' => 'El nombre del diario debe ser una cadena de caracteres.',
            'name_journal.max' => 'El nombre del diario no puede tener más de :max caracteres.',

            'image_journal.required' => 'La imagen del diario es obligatoria.',
            'image_journal.mimes' => 'El formato de la imagen debe ser png o jpg.',
            'image_journal.file' => 'El campo debe ser un archivo.',
            'image_journal.max' => 'El tamaño máximo de la imagen es :max kilobytes.',

            'link_journal.string' => 'El enlace del diario debe ser una cadena de caracteres.',
            'link_journal.max' => 'El enlace del diario no puede tener más de :max caracteres.',

            'registerBy.required' => 'El campo "Registrado por" es obligatorio.',
            'registerBy.string' => 'El campo "Registrado por" debe ser una cadena de caracteres.',
            'registerBy.max' => 'El campo "Registrado por" no puede tener más de :max caracteres.',
        ];
    }

    public function attributes()
    {
        return
        [
            'name_journal' => 'Nombre de la Revista',
            'image_journal' => 'Imagen de la Revista',
            'link_journal' => 'Enlace de la Revista',
            'registerBy' => 'Registrado por',
        ];
    }
}
