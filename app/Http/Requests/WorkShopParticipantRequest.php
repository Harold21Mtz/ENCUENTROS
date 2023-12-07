<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkShopParticipantRequest extends FormRequest
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
                'participant_name' => 'required|string|max:50',
                'participant_title' => 'required|string|max:20',
                'participant_presentation' => 'required|string|max:200',
                'participant_description' => 'required|string|max:1000',
                'participant_university' => 'required|string|max:100',
                'participant_profile' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'participant_image_country' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'participant_name' => 'required|string|max:50',
                'participant_title' => 'required|string|max:20',
                'participant_presentation' => 'required|string|max:200',
                'participant_description' => 'required|string|max:1000',
                'participant_university' => 'required|string|max:100',
                'participant_profile' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'participant_image_country' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
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
            'participant_name.required' => 'El campo "Nombre del Participante" es obligatorio.',
            'participant_name.string' => 'El campo "Nombre del Participante" debe ser una cadena de caracteres.',
            'participant_name.max' => 'El campo "Nombre del Participante" no puede tener más de :max caracteres.',

            'participant_title.required' => 'El campo "Título del Participante" es obligatorio.',
            'participant_title.string' => 'El campo "Título del Participante" debe ser una cadena de caracteres.',
            'participant_title.max' => 'El campo "Título del Participante" no puede tener más de :max caracteres.',

            'participant_presentation.required' => 'El campo "Presentación del Participante" es obligatorio.',
            'participant_presentation.string' => 'El campo "Presentación del Participante" debe ser una cadena de caracteres.',
            'participant_presentation.max' => 'El campo "Presentación del Participante" no puede tener más de :max caracteres.',

            'participant_description.required' => 'El campo "Descripción del Participante" es obligatorio.',
            'participant_description.string' => 'El campo "Descripción del Participante" debe ser una cadena de caracteres.',
            'participant_description.max' => 'El campo "Descripción del Participante" no puede tener más de :max caracteres.',

            'participant_university.required' => 'El campo "Universidad del Participante" es obligatorio.',
            'participant_university.string' => 'El campo "Universidad del Participante" debe ser una cadena de caracteres.',
            'participant_university.max' => 'El campo "Universidad del Participante" no puede tener más de :max caracteres.',

            'participant_profile.mimes' => 'El archivo de perfil debe ser de tipo: png, jpg.',
            'participant_profile.file' => 'El archivo de perfil debe ser un archivo.',
            'participant_profile.max' => 'El archivo de perfil no puede ser mayor de :max kilobytes.',

            'participant_image_country.mimes' => 'El archivo de la imagen del país debe ser de tipo: png, jpg.',
            'participant_image_country.file' => 'El archivo de la imagen del país debe ser un archivo.',
            'participant_image_country.max' => 'El archivo de la imagen del país no puede ser mayor de :max kilobytes.',

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
            'participant_name' => 'Nombre y Apellido del Participante',
            'participant_title' => 'Título del Participante',
            'participant_presentation' => 'Presentación del Participante',
            'participant_description' => 'Descripción del Participante',
            'participant_university' => 'Universidad del Participante',
            'participant_profile' => 'Perfil del Participante',
            'participant_image_country' => 'Imagen del País del Participante',
            'registerBy' => 'Registrado por',
        ];
    }
}
