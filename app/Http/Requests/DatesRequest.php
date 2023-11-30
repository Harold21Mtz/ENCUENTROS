<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatesRequest extends FormRequest
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
                'date_name' => 'required|string|max:100',
                'date_important' => 'required|string|max:100',
                'date_description' => 'nullable|string|max:500',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'date_name' => 'required|string|max:100',
                'date_important' => 'required|string|max:100',
                'date_description' => 'nullable|string|max:500',
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
            'date_name' => 'Nombre de la Fecha',
            'date_name' => 'Fecha Importante',
            'date_description' => 'Descripción de la Fecha Importante',
            'registerBy' => 'Registrado por',
        ];
    }
}
