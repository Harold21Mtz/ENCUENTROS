<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionsRequest extends FormRequest
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
     * @return string[]|null
     */
    public function rules(): ?array
    {
        if (request()->isMethod('post')) {
            return [
                'submission_conference' => 'required|string|max:300',
                'submission_structure' => 'required|string|max:200',
                'submission_description' => 'required|string|max:900',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'submission_conference' => 'required|string|max:300',
                'submission_structure' => 'required|string|max:200',
                'submission_description' => 'required|string|max:900',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'submission_conference.required' => 'El campo de la conferencia es obligatorio.',
            'submission_structure.required' => 'El campo de la estructura es obligatorio.',
            'submission_description.max' => 'La descripción no debe exceder los :max caracteres.',
            'registerBy.required' => 'El campo Register By es obligatorio.',
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
            'submission_conference' => 'Conferencia',
            'submission_structure' => 'Estructura',
            'submission_description' => 'Descripción',
            'registerBy' => 'Registro por',
        ];
    }
}
