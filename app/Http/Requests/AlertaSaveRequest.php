<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertaSaveRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct();

        $niveles = array_keys( config('system.niveles_alerta') );
        $this->niveles = implode(',', $niveles);
    }

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
        $alerta_id = $this->route('alerta')->id ?? 0;
        return [
            'nombre' => ['required', 'unique:alertas,nombre,' . $alerta_id],
            'nivel' => ['required', 'in:' . $this->niveles],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de la alerta'),
            'nombre.unique' => __('Escribe un nombre diferente de la alerta'),
            'nivel.required' => __('Selecciona el nivel de alerta'),
            'nivel.in' => __('Selecciona un nivel válido de alerta'),
        ];
    }
}
