<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class GroupRequest extends FormRequest
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
            $id = Route::getCurrentRoute()->parameters()['group']['id'];

        return [
            'name' => 'required|min:3|string',
            'slug' => 'required|min:3|string|unique:groups,slug,'.$id
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório!',
            '*.unique'   => 'Este :attribute já está em uso!',
            '*.string'   => 'Por favor, informe uma string!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'slug' => 'slug',
        ];
    }
}
