<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
        $maxSize = 2048;

        if ($this->isMethod('post')) {
            return [
                'event_name' => 'required|string|max:50',
                'event_description_one' => 'required|string|max:1000',
                'event_description_two' => 'required|string|max:1000',
                'event_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_one' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_two' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_three' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_four' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_five' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_six' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_seven' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_eight' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'event_name' => 'required|string|max:50',
                'event_description_one' => 'required|string|max:1000',
                'event_description_two' => 'required|string|max:1000',
                'event_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_one' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_two' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_three' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_four' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_five' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_six' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_seven' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'event_image_eight' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
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
            'event_name.required' => 'El campo "Nombre del Evento" es obligatorio.',
            'event_name.string' => 'El campo "Nombre del Evento" debe ser una cadena de caracteres.',
            'event_name.max' => 'El campo "Nombre del Evento" no puede tener más de :max caracteres.',

            'event_description_one.required' => 'El campo "Descripción del Evento (Parte 1)" es obligatorio.',
            'event_description_one.string' => 'El campo "Descripción del Evento (Parte 1)" debe ser una cadena de caracteres.',
            'event_description_one.max' => 'El campo "Descripción del Evento (Parte 1)" no puede tener más de :max caracteres.',

            'event_description_two.required' => 'El campo "Descripción del Evento (Parte 2)" es obligatorio.',
            'event_description_two.string' => 'El campo "Descripción del Evento (Parte 2)" debe ser una cadena de caracteres.',
            'event_description_two.max' => 'El campo "Descripción del Evento (Parte 2)" no puede tener más de :max caracteres.',

            'event_image.required' => 'La imagen principal del evento es obligatoria.',
            'event_image.mimes' => 'La imagen principal del evento debe ser de tipo: png, jpg.',
            'event_image.file' => 'La imagen principal del evento debe ser un archivo.',
            'event_image.max' => 'La imagen principal del evento no puede ser mayor de :max kilobytes.',

            'event_image_one.mimes' => 'La imagen del evento (1) debe ser de tipo: png, jpg.',
            'event_image_one.file' => 'La imagen del evento (1) debe ser un archivo.',
            'event_image_one.max' => 'La imagen del evento (1) no puede ser mayor de :max kilobytes.',

            'event_image_two.mimes' => 'La imagen del evento (2) debe ser de tipo: png, jpg.',
            'event_image_two.file' => 'La imagen del evento (2) debe ser un archivo.',
            'event_image_two.max' => 'La imagen del evento (2) no puede ser mayor de :max kilobytes.',

            'event_image_three.mimes' => 'La imagen del evento (3) debe ser de tipo: png, jpg.',
            'event_image_three.file' => 'La imagen del evento (3) debe ser un archivo.',
            'event_image_three.max' => 'La imagen del evento (3) no puede ser mayor de :max kilobytes.',

            'event_image_four.mimes' => 'La imagen del evento (4) debe ser de tipo: png, jpg.',
            'event_image_four.file' => 'La imagen del evento (4) debe ser un archivo.',
            'event_image_four.max' => 'La imagen del evento (4) no puede ser mayor de :max kilobytes.',

            'event_image_five.mimes' => 'La imagen del evento (5) debe ser de tipo: png, jpg.',
            'event_image_five.file' => 'La imagen del evento (5) debe ser un archivo.',
            'event_image_five.max' => 'La imagen del evento (5) no puede ser mayor de :max kilobytes.',

            'event_image_six.mimes' => 'La imagen del evento (6) debe ser de tipo: png, jpg.',
            'event_image_six.file' => 'La imagen del evento (6) debe ser un archivo.',
            'event_image_six.max' => 'La imagen del evento (6) no puede ser mayor de :max kilobytes.',

            'event_image_seven.mimes' => 'La imagen del evento (7) debe ser de tipo: png, jpg.',
            'event_image_seven.file' => 'La imagen del evento (7) debe ser un archivo.',
            'event_image_seven.max' => 'La imagen del evento (7) no puede ser mayor de :max kilobytes.',

            'event_image_eight.mimes' => 'La imagen del evento (8) debe ser de tipo: png, jpg.',
            'event_image_eight.file' => 'La imagen del evento (8) debe ser un archivo.',
            'event_image_eight.max' => 'La imagen del evento (8) no puede ser mayor de :max kilobytes.',

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
            'event_name' => 'Nombre del Evento',
            'event_description_one' => 'Descripción del Evento (Parte 1)',
            'event_description_two' => 'Descripción del Evento (Parte 2)',
            'event_image' => 'Imagen Principal del Evento',
            'event_image_one' => 'Imagen del Evento (1)',
            'event_image_two' => 'Imagen del Evento (2)',
            'event_image_three' => 'Imagen del Evento (3)',
            'event_image_four' => 'Imagen del Evento (4)',
            'event_image_five' => 'Imagen del Evento (5)',
            'event_image_six' => 'Imagen del Evento (6)',
            'event_image_seven' => 'Imagen del Evento (7)',
            'event_image_eight' => 'Imagen del Evento (8)',
            'registerBy' => 'Registrado por',
        ];
    }
}
