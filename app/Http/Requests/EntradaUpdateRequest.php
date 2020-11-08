<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Ahex\Entrada\Domain\UpdaterFactory;

class EntradaUpdateRequest extends FormRequest
{
    private $updaters_name;

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->updaters_name = implode(',', UpdaterFactory::names());
    }

    public function rules()
    {
        return [
            'actualizar' => ['required', 'in:' . $this->updaters_name],
        ];
    }

    public function messages()
    {
        return [
            'actualizar.required' => __('Actualización de entrada requerida'),
            'actualizar.in' => __('Actualización de entrada no válida'),
        ];
    }
}
