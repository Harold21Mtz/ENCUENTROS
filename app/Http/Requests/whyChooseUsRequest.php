<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class whyChooseUsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'titulo_why' => 'required|unique:portadas,titulo',
                'descripcion_why' => 'required',
                'imagen_why' => 'required'
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'titulo_why' => 'required',
                'descripcion_why' => 'required',
                'imagen_why' => 'required'
            ];
        }
        return [];
    }

}
