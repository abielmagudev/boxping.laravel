<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObservacionSaveRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct();

        $tipos = array_keys( config('system.observaciones') );
        $this->tipos = implode(',', $tipos);
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
        $observacion_id = $this->route('observacion')->id ?? 0;

        return [
            'tipo' => ['required', 'in:' . $this->tipos],
            'nombre' => ['required', 'unique:observaciones,nombre,' . $observacion_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de obsevación'),
            'nombre.unique' => __('Escribe un nombre diferente de observación'),
            'tipo.required' => __('Selecciona el tipo de observación'),
            'tipo.in' => __('Selecciona un tipo válido de observación'),
        ];
    }
}
