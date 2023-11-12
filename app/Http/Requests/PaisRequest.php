<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaisRequest extends FormRequest
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
		if(request()->isMethod('post')){
			return [
				'nombre' => 'required|unique:pais,nombre|regex:/^[\pL\s\-]+$/u'
			];	
		} elseif(request()->isMethod('put')){
			return [
				'nombre' => 'required|regex:/^[\pL\s\-]+$/u'
			];
		}
    }
	
	/*public function attributes()
    {
        return [
            'nombre' => 'nombre del país'
        ];
    }*/
	
	/*public function messages()
    {
        return [
            'nombre' => 'Debe ingresar el nombre del país'
        ];
    }*/
}
