<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakersRequest extends FormRequest
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
    {$maxSize = 2048;
        if (request()->isMethod('post')) {
            return [
                'speaker_name' => 'required|string|max:50',
                'speaker_title' => 'required|string|max:20',
                'speaker_presentation' => 'required|string|max:200',
                'speaker_description' => 'required|string|max:1000',
                'speaker_university' => 'required|string|max:100',
                'speaker_profile' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'speaker_image_country' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'speaker_name' => 'required|string|max:50',
                'speaker_title' => 'required|string|max:20',
                'speaker_presentation' => 'required|string|max:200',
                'speaker_description' => 'required|string|max:1000',
                'speaker_university' => 'required|string|max:100',
                'speaker_profile' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'speaker_image_country' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
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
            'speaker_name.required' => 'El campo "Nombre del Ponente" es obligatorio.',
            'speaker_name.string' => 'El campo "Nombre del Ponente" debe ser una cadena de caracteres.',
            'speaker_name.max' => 'El campo "Nombre del Ponente" no puede tener más de :max caracteres.',

            'speaker_title.required' => 'El campo "Título del Ponente" es obligatorio.',
            'speaker_title.string' => 'El campo "Título del Ponente" debe ser una cadena de caracteres.',
            'speaker_title.max' => 'El campo "Título del Ponente" no puede tener más de :max caracteres.',

            'speaker_presentation.required' => 'El campo "Presentación del Ponente" es obligatorio.',
            'speaker_presentation.string' => 'El campo "Presentación del Ponente" debe ser una cadena de caracteres.',
            'speaker_presentation.max' => 'El campo "Presentación del Ponente" no puede tener más de :max caracteres.',

            'speaker_description.required' => 'El campo "Descripción del Ponente" es obligatorio.',
            'speaker_description.string' => 'El campo "Descripción del Ponente" debe ser una cadena de caracteres.',
            'speaker_description.max' => 'El campo "Descripción del Ponente" no puede tener más de :max caracteres.',

            'speaker_university.required' => 'El campo "Universidad del Ponente" es obligatorio.',
            'speaker_university.string' => 'El campo "Universidad del Ponente" debe ser una cadena de caracteres.',
            'speaker_university.max' => 'El campo "Universidad del Ponente" no puede tener más de :max caracteres.',

            'speaker_profile.mimes' => 'El archivo de perfil debe ser de tipo: png, jpg.',
            'speaker_profile.file' => 'El archivo de perfil debe ser un archivo.',
            'speaker_profile.max' => 'El archivo de perfil no puede ser mayor de :max kilobytes.',

            'speaker_image_country.mimes' => 'El archivo de la imagen del país debe ser de tipo: png, jpg.',
            'speaker_image_country.file' => 'El archivo de la imagen del país debe ser un archivo.',
            'speaker_image_country.max' => 'El archivo de la imagen del país no puede ser mayor de :max kilobytes.',

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
            'speaker_name' => 'Nombre y apellido del Ponente',
            'speaker_title' => 'Título del Ponente',
            'speaker_presentation' => 'Presentación del Ponente',
            'speaker_description' => 'Descripción del Ponente',
            'speaker_university' => 'Universidad del Ponente',
            'speaker_profile' => 'Perfil del Ponente',
            'speaker_image_country' => 'Imagen del País del Ponente',
            'registerBy' => 'Registrado por',
        ];
    }
}
