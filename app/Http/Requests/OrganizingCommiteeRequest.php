<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizingCommiteeRequest extends FormRequest
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
                'organizer_charge' => 'required|string|max:50',
                'organizer_name' => 'required|string|max:50',
                'organizer_title' => 'required|string|max:10',
                'organizer_university' => 'required|string|max:100',
                'organizer_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'organizer_charge' => 'required|string|max:50',
                'organizer_name' => 'required|string|max:50',
                'organizer_title' => 'required|string|max:10',
                'organizer_university' => 'required|string|max:100',
                'organizer_description' => 'required|string|max:200',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }
}
