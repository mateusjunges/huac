<?php

namespace HUAC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $id = 'NULL';
        if (Route::getCurrentRoute()->parameters() != null)
            $id = Route::getCurrentRoute()->parameters()['surgery'];

        return [
            'name'           => 'required|full_name|min:7',
            'medical_record' => 'required|unique:patients,medical_record,'.$id,
        ];
    }
}
