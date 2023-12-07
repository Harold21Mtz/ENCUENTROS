<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScientificCommiteeNRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'scientific_charge' => 'required|string|max:50',
                'scientific_name' => 'required|string|max:50',
                'scientific_title' => 'required|string|max:10',
                'scientific_university' => 'required|string|max:100',
                'scientific_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'scientific_charge' => 'required|string|max:50',
                'scientific_name' => 'required|string|max:50',
                'scientific_title' => 'required|string|max:10',
                'scientific_university' => 'required|string|max:100',
                'scientific_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }
}
