<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //não necessita de autorização por usuário logado.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',            
        ];
    }
}
