<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ProcedureRequest extends FormRequest
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
        $procedure = 'NULL';
        if (Route::getCurrentRoute()->parameters() != null)
            $procedure = Route::getCurrentRoute()->parameters()['procedure'];

        $id = $procedure != 'NULL' ? $procedure->id : 'NULL';

        return [
            'name'     => 'required|max:150|unique:procedures,name,'.$id,
            'sus_code' => 'required|max:50|unique:procedures,sus_code,'.$id,
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name'     => 'nome',
            'sus_code' => 'código sus',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório!',
            '*.max'      => 'O campo :attribute pode possuir no máximo :max caracteres!',
            '*.unique'   => 'O :attribute utilizado já está cadastrado!'
        ];
    }
}
