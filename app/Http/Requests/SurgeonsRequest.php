<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class SurgeonsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $surgeon = 'NULL';
        if (Route::getCurrentRoute()->parameters() != null)
            $surgeon = Route::getCurrentRoute()->parameters()['surgeon'];
        $id = $surgeon !== 'NULL' ? $surgeon->id : 'NULL';

        return [
            'user_id' => "required|unique:surgeons,user_id,${id}",
            'crm'  => "required|unique:surgeons,crm,${id}|min:3",
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'user_id' => 'usuário',
            'crm'  => 'crm',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório!',
            '*.unique'   => 'Este :attribute já está vinculado a um médico!',
            'crm.min'    => 'Informe pelo menos 3 caracteres para o CRM'
        ];
    }
}
