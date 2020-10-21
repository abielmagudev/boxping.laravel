<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertaSaveRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct();

        $niveles = array_keys( config('system.alertas') );
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
            'nivel' => ['required', 'in:' . $this->niveles],
            'nombre' => ['required', 'unique:alertas,nombre,' . $alerta_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de obsevación'),
            'nombre.unique' => __('Escribe un nombre diferente de observación'),
            'nivel.required' => __('Selecciona el nivel de alerta'),
            'nivel.in' => __('Selecciona un nivel válido de alerta'),
        ];
    }
}
