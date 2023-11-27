<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class HotelsRequest extends FormRequest
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
                'hotel_name' => 'required|string|max:50',
                'hotel_description' => 'required|string|max:1000',
                'hotel_contact_number' => 'required|string|max:30',
                'hotel_contact_email' => 'required|string|max:30',
                'hotel_image' => 'required|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_one' => 'nullable|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_two' => 'nullable|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_three' => 'nullable|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        } elseif (request()->isMethod('put')) {
            return [
                'hotel_name' => 'required|string|max:50',
                'hotel_description' => 'required|string|max:1000',
                'hotel_contact_number' => 'required|string|max:30',
                'hotel_contact_email' => 'required|string|max:30',
                'hotel_image' => 'sometimes|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_one' => 'sometimes|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_two' => 'sometimes|mimes:png,jpg|file|max:2048',
                'hotel_image_secondary_three' => 'sometimes|mimes:png,jpg|file|max:2048',
                'registerBy' => 'required|string|max:30',
            ];
        }
        return null;
    }

    public function attributes()
    {
        return [
            'id' => 'hotel'
        ];
    }
}
