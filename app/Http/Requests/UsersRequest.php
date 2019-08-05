<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UsersRequest extends FormRequest
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
        $id = 'NULL';
        if (Route::getCurrentRoute()->parameters() != null)
            $id = Route::getCurrentRoute()->parameters()['user'];
        return [
            'name'     => 'required|min:3|full_name|string',
            'username' => 'required|string|unique:users,username,'.$id,
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            '*.required'     => 'O atributo :attribute é obrigatório!',
            '*.unique'       => 'Este :attribute já está em uso!',
            'name.full_name' => 'Informe o nome completo!',
        ];
    }

    public function attributes()
    {
        return [
            'name'     => 'nome',
            'username' => 'username',
            'email'    => 'email',
            'password' => 'senha'
        ];
    }
}
