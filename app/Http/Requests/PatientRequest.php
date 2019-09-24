<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PatientRequest extends FormRequest
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
        $patient = 'NULL';
        if (Route::getCurrentRoute()->parameters() != null)
            $patient = Route::getCurrentRoute()->parameters()['patient'];
        $patient = $patient != 'NULL' ? $patient->id : 'NULL';

        return [
            'name'           => 'required|min:7|full_name',
            'medical_record' => 'required|unique:patients,medical_record,'.$patient,
            'mother_name'    => 'required|min:7|full_name',
            'birthday_at'    => 'required|date|before:today',
            'gender'         => 'required|in:M,O,F'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name'           => 'nome',
            'medical_record' => 'prontuário',
            'mother_name'    => 'nome da mãe',
            'birthday_at'    => 'data de nascimento',
            'gender'         => 'gênero'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            '*.required'         => 'O campo :attribute é obrigatório!',
            '*.full_name'        => 'Você deve informar o nome completo!',
            '*.min'              => 'O campo :attribute requer :min caracteres!',
            'birthday_at.date'   => 'Informe uma data válida!',
            'gender.in'          => 'Selecione uma das opções da lista!',
            '*unique'            => 'Este :attribute já está cadastrado para outro paciente!',
            'birthday_at.before' => 'A data de nascimento deve ser anterior a hoje!'
        ];
    }
}
