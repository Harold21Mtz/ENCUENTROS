<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitucionRequest extends FormRequest
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
				'nombre' => 'required|unique:institucions,nombre|regex:/^[\pL\s\-]+$/u',
				'numerodocumento' => 'required',
				'direccion' => 'required',
				'telefono' => 'nullable|digits:10',
				'celular' => 'required|digits:10',
				'email' => 'required|unique:institucions,email|email',
				'paginaweb' => 'nullable|url',
				'horario' => 'nullable',
				'representantelegal' => 'required|regex:/^[\pL\s\-]+$/u',
				'principal' => 'required|regex:/^[\pL\s\-]+$/u',
				'image' => 'nullable',
				'ciudad_id' => 'required',
				'tipodocumento_id' => 'required'
				
			];	
		} elseif(request()->isMethod('put')){
			return [
				'nombre'=>'required|regex:/^[\pL\s\-]+$/u',
				'numerodocumento' => 'required',
				'direccion' => 'required',
				'telefono' => 'nullable|digits:10',
				'celular' => 'required|digits:10',
				'paginaweb' => 'nullable|url',
				'horario' => 'nullable',
				'representantelegal' => 'required|regex:/^[\pL\s\-]+$/u',
				'principal' => 'required|regex:/^[\pL\s\-]+$/u',
				'image' => 'nullable',
				'ciudad_id' => 'required',
				'tipodocumento_id' => 'required'
			];
		}
    }
	
	public function attributes()
    {
        return [
            'ciudad_id' => 'ciudad',
			'tipodocumento_id' => 'tipodocumento'
        ];
    }
}
