<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoomsRequest extends FormRequest
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
            $id = Route::getCurrentRoute()->parameters()['room'];
        return [
            'name'                              => 'required|min:6|string',
            'morning_reservation_starts_at'     => 'required_without:afternoon_reservation_starts_at',
            'morning_reservation_ends_at'       => 'required_with:morning_reservation_starts_at',
            'afternoon_reservation_starts_at'   => 'required_without:morning_reservation_starts_at',
            'afternoon_reservation_ends_at'     => 'required_with:afternoon_reservation_starts_at',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'O :attribute deve ter no mínimo :min letras!',
            '*.required'     => 'O :attribute é obrigatório!',
            '*.required_with' => 'Você deve selecionar um :attribute para o uso da sala!',
            '*.required_without' => 'Você deve selecionar um :attribute para o uso da sala!'
        ];
    }

    public function attributes()
    {
        return [
            'name'                            => 'nome',
            'morning_reservation_starts_at'   => 'horário de início no período da manhã',
            'morning_reservation_ends_at'     => 'horário de término no período da manhã',
            'afternoon_reservation_starts_at' => 'horário de início no período da tarde',
            'afternoon_reservation_ends_at'   => 'horário de término no período da tarde'
        ];
    }
}
