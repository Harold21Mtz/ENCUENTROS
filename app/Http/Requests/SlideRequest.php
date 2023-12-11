<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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

        if ($this->isMethod('post')) {
            return [
                'conference_name' => 'required|string|max:70',
                'conference_date' => 'required|string|max:30',
                'university_name' => 'required|string|max:70',
                'conference_logo' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_one' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_two' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_three' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_four' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_five' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'registerBy' => 'required|string|max:30',
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'conference_name' => 'required|string|max:70',
                'conference_date' => 'required|string|max:30',
                'university_name' => 'required|string|max:70',
                'conference_logo' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image' => "required|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_one' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_two' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_three' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_four' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
                'conference_image_secondary_five' => "nullable|mimes:png,jpg|file|max:{$maxSize}",
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
            'conference_name.required' => 'El campo "Nombre de la conferencia" es obligatorio.',
            'conference_name.string' => 'El campo "Nombre de la conferencia" debe ser una cadena de caracteres.',
            'conference_name.max' => 'El campo "Nombre de la conferencia" no puede tener más de :max caracteres.',

            'conference_date.required' => 'El campo "Fecha de la conferencia" es obligatorio.',
            'conference_date.string' => 'El campo "Fecha de la conferencia" debe ser una cadena de caracteres.',
            'conference_date.max' => 'El campo "Fecha de la conferencia" no puede tener más de :max caracteres.',

            'university_name.required' => 'El campo "Nombre de la universidad" es obligatorio.',
            'university_name.string' => 'El campo "Nombre de la universidad" debe ser una cadena de caracteres.',
            'university_name.max' => 'El campo "Nombre de la universidad" no puede tener más de :max caracteres.',

            'conference_logo.required' => 'El campo "Logo de la conferencia" es obligatorio.',
            'conference_logo.mimes' => 'El campo "Logo de la conferencia" debe ser un archivo de tipo: png, jpg.',
            'conference_logo.file' => 'El campo "Logo de la conferencia" debe ser un archivo válido.',
            'conference_logo.max' => 'El campo "Logo de la conferencia" no puede tener un tamaño mayor a :max KB.',

            'conference_image.required' => 'El campo "Imagen de la conferencia" es obligatorio.',
            'conference_image.mimes' => 'El campo "Imagen de la conferencia" debe ser un archivo de tipo: png, jpg.',
            'conference_image.file' => 'El campo "Imagen de la conferencia" debe ser un archivo válido.',
            'conference_image.max' => 'El campo "Imagen de la conferencia" no puede tener un tamaño mayor a :max KB.',

            'conference_image_secondary_one.mimes' => 'El campo "Imagen secundaria uno" debe ser un archivo de tipo: png, jpg.',
            'conference_image_secondary_one.file' => 'El campo "Imagen secundaria uno" debe ser un archivo válido.',
            'conference_image_secondary_one.max' => 'El campo "Imagen secundaria uno" no puede tener un tamaño mayor a :max KB.',

            'conference_image_secondary_two.mimes' => 'El campo "Imagen secundaria dos" debe ser un archivo de tipo: png, jpg.',
            'conference_image_secondary_two.file' => 'El campo "Imagen secundaria dos" debe ser un archivo válido.',
            'conference_image_secondary_two.max' => 'El campo "Imagen secundaria dos" no puede tener un tamaño mayor a :max KB.',

            'conference_image_secondary_three.mimes' => 'El campo "Imagen secundaria tres" debe ser un archivo de tipo: png, jpg.',
            'conference_image_secondary_three.file' => 'El campo "Imagen secundaria tres" debe ser un archivo válido.',
            'conference_image_secondary_three.max' => 'El campo "Imagen secundaria tres" no puede tener un tamaño mayor a :max KB.',

            'conference_image_secondary_four.mimes' => 'El campo "Imagen secundaria cuatro" debe ser un archivo de tipo: png, jpg.',
            'conference_image_secondary_four.file' => 'El campo "Imagen secundaria cuatro" debe ser un archivo válido.',
            'conference_image_secondary_four.max' => 'El campo "Imagen secundaria cuatro" no puede tener un tamaño mayor a :max KB.',

            'conference_image_secondary_five.mimes' => 'El campo "Imagen secundaria cinco" debe ser un archivo de tipo: png, jpg.',
            'conference_image_secondary_five.file' => 'El campo "Imagen secundaria cinco" debe ser un archivo válido.',
            'conference_image_secondary_five.max' => 'El campo "Imagen secundaria cinco" no puede tener un tamaño mayor a :max KB.',

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
            'conference_name' => 'Nombre de la conferencia',
            'conference_date' => 'Fecha de la conferencia',
            'university_name' => 'Nombre de la universidad',
            'conference_logo' => 'Logo de la conferencia',
            'conference_image' => 'Imagen de la conferencia',
            'conference_image_secondary_one' => 'Imagen secundaria uno',
            'conference_image_secondary_two' => 'Imagen secundaria dos',
            'conference_image_secondary_three' => 'Imagen secundaria tres',
            'conference_image_secondary_four' => 'Imagen secundaria cuatro',
            'conference_image_secondary_five' => 'Imagen secundaria cinco',
            'registerBy' => 'Registrado por',
        ];
    }
}
