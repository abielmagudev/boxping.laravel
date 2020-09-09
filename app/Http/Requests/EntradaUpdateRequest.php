<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaUpdateRequest extends FormRequest
{
    private $updaters = array(
        'entrada',
        'recibido',
        'cruce',
        'reempaque',
        'remitente',
        'destinatario',
        'verificacion',     
    );

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $updaters = $this->getUpdatersString();

        return [
            'update' => ['required', 'in:' . $updaters],
        ];
    }

    public function messages()
    {
        return [
            'update.required' => __('Actualizacion de entrada no valida'),
            'update.in' => __('Actualizacion de entrada no valida'),
        ];
    }

    private function getUpdatersString()
    {
        return implode(',', $this->updaters);
    }
}
