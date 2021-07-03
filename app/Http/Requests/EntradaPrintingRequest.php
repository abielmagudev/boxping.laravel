<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\Entrada\Application\Printing\PrintingContainer;

class EntradaPrintingRequest extends FormRequest
{
    private $sheets;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'hoja_exists' => PrintingContainer::exists( $this->route('hoja') ),
            'hoja' => $this->route('hoja'),
        ]);
    }

    public function rules()
    {
        return [
            'hoja_exists' => 'accepted',
            'entradas' => 'array',
            'entradas.*' => 'exists:entradas,id',
        ];
    }

    public function messages()
    {
        return [
            'hoja_exists.accepted' => __('Selecciona una hoja de impresión válida'),
            'entradas.array' => __('Selecciona las entradas para su impresión'),
            'entradas.*.exists' => __('Selecciona las entradas válidas para su impresión'),
        ];
    }
}
