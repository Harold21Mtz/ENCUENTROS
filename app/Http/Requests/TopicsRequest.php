<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicsRequest extends FormRequest
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
                'program_name' => 'required|string|max:50',
                'program_description' => 'nullable|string|max:600',
                'program_topics' => 'required|string|max:1000',
                'program_image' => 'required|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'program_name' => 'required|string|max:50',
                'program_description' => 'nullable|string|max:600',
                'program_topics' => 'required|string|max:1000',
                'program_image' => 'sometimes|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    public function attributes()
    {
        return [
            'id' => 'topic'
        ];
    }
}
