<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): ?array
    {
        $maxSize = 2048;

        if ($this->isMethod('post')) {
            return [
                'hotel_name' => 'required|string|max:50',
                'hotel_description' => 'required|string|max:1000',
                'hotel_contact_number' => 'required|string|max:30',
                'hotel_contact_email' => 'required|string|max:30',
                'hotel_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_one' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_two' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_three' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'hotel_name' => 'required|string|max:50',
                'hotel_description' => 'required|string|max:1000',
                'hotel_contact_number' => 'required|string|max:30',
                'hotel_contact_email' => 'required|string|max:30',
                'hotel_image' => "sometimes|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_one' => "sometimes|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_two' => "sometimes|mimes:png,jpg|file|max:{$maxSize}",
                'hotel_image_secondary_three' => "sometimes|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        }

        return null;
    }

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

    public function attributes()
    {
        return [
            'hotel_name' => 'Nombre del Hotel',
            'hotel_description' => 'Descripción del Hotel',
            'hotel_contact_number' => 'Número de Contacto del Hotel',
            'hotel_contact_email' => 'Correo Electrónico de Contacto del Hotel',
            'hotel_image' => 'Imagen Principal del Hotel',
            'hotel_image_secondary_one' => 'Primera Imagen Secundaria del Hotel',
            'hotel_image_secondary_two' => 'Segunda Imagen Secundaria del Hotel',
            'hotel_image_secondary_three' => 'Tercera Imagen Secundaria del Hotel',
            'registerBy' => 'Registrado por',
        ];
    }
}
