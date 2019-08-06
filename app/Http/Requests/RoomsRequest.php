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
            'morning_reservation_starts_at'     => 'required',
            'morning_reservation_ends_at'       => 'required',
            'afternoon_reservation_starts_at'   => 'required',
            'afternoon_reservation_ends_at'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required'     => 'O :attribute é obrigatório!'
        ];
    }

    public function attributes()
    {
        return [
            'name'                            => 'nome',
            'morning_reservation_starts_at'   => 'morning_reservation_starts_at',
            'morning_reservation_ends_at'     => 'morning_reservation_ends_at',
            'afternoon_reservation_starts_at' => 'afternoon_reservation_starts_at',
            'afternoon_reservation_ends_at'   => 'afternoon_reservation_ends_at'
        ];
    }
}
