<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class SurgerySchedulingRequest extends FormRequest
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
        return [
            'name'                      => 'required|full_name|min:7',
            'medical_record'            => 'required',
            'mother_name'               => 'required|full_name|min:7',
            'gender'                    => 'required|in:M,F,O',
            'birthday_at'               => 'required|date',
            'procedure_id'              => 'required',
            'surgery_classification_id' => 'required',
            'anesthesia_id'             => 'required',
            'head_surgeon'              => 'required|different:assistant_surgeon',
            'assistant_surgeon'         => 'different:head_surgeon',
            'materials'                 => 'required|min:10',
            'estimated_duration_time'   => 'required|'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name'                      => 'nome',
            'medical_record'            => 'prontuário',
            'gender'                    => 'gênero',
            'birthday_at'               => 'data de nascimento',
            'procedure_id'              => 'procedimento',
            'surgery_classification_id' => 'classificação',
            'anesthesia_id'             => 'anestesia',
            'head_surgeon'              => 'cirurgião principal',
            'assistant_surgeon'         => 'cirurgião assistente',
            'materials'                 => 'materiais',
            'mother_name'               => 'nome da mãe',
            'estimated_duration_time'   => 'tempo de duração estimado'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            '*.required'                  => 'O campo :attribute é obrigatório!',
            '*.date'                      => 'Por favor, informe uma data válida!',
            '*.full_name'                 => 'O :attribute requer o nome completo!',
            'head_surgeon.different'      => 'O cirurgião auxiliar e principal não podem ser os mesmos!',
            'assistant_surgeon.different' => 'O cirurgião auxiliar e principal não podem ser os mesmos!',
            '*.unique'                    => 'Este :attribute já está em uso!',
            'gender.in'                   => 'Por favor, selecione um dos valores listados!',
            '*.min'                       => 'Por favor, informe :min caracteres!'
        ];
    }
}
