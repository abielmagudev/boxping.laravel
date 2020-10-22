<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Zona;

class ZonaSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de la zona'),
        ];
    }

    /**
     * 
     * After of validate with FormRequest...
     * 
     * Valida si la etapa tiene una zona con el nuevo nombre
     * 
     */
    public function withValidator($validator)
    {
        if( ! $validator->fails() )
        {
            if( $this->existsZonaEtapa() )
            {
                $validator->after( function ($validator) {
                    $validator->errors()->add('message', 'Escribe un nombre diferente de zona');
                });
            }
        }
    }

    public function existsZonaEtapa()
    {
        list($zona_nombre, $zona_id, $etapa_id) = $this->formInputs();

        return Zona::where('nombre', $zona_nombre)
                   ->where('etapa_id', $etapa_id)
                   ->where('id', '<>', $zona_id)
                   ->exists();
    } 
    
    public function formInputs()
    {
        return [
            $this->input('nombre'),
            $this->route('zona')->id ?? 0,
            $this->route('etapa')->id,
        ];
    }
}
