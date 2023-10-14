<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarEleccion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'MOTIVO_ELECCION' => 'required|string',
            'FECHA_INI_CONVOCATORIA' => 'required|date',
            'FECHA_FIN_CONVOCATORIA' =>'required|date',
            'FECHA_ELECCION' => 'required|date'
        ];
    }
}
