<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;

class GuiaImpresionSaveRequest extends FormRequest
{
    private $guia_impresion_actual;
    private $mediciones_pagina;
    private $mediciones_fuente;
    private $nombres_fuentes;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->guia_impresion_actual = $this->guia->id ?? 0;
        $this->mediciones_pagina = PageDesigner::implodeMeasurements();
        $this->mediciones_fuente = PageDesigner::implodeFontMeasurements();
        $this->nombres_fuentes   = PageDesigner::implodeFonts();
    }

    public function rules()
    {
        return [
            // Guia
            'nombre' => ['required',"unique:guias_impresion,nombre,{$this->guia_impresion_actual}"],
            'descripcion' => ['nullable','string'],

            // Formato
            'formato' => ['required','array:ancho,alto,medicion'],
            'formato.ancho' => 'numeric',
            'formato.alto' => 'numeric',
            'formato.medicion' => "in:{$this->mediciones_pagina}",

            // Márgenes
            'margenes' => ['array:arriba,derecha,abajo,izquierda,medicion'],
            'margenes.arriba' => ['nullable','numeric'],
            'margenes.derecha' => ['nullable','numeric'],
            'margenes.abajo' => ['nullable','numeric'],
            'margenes.izquierda' => ['nullable','numeric'],
            'margenes.medicion' => "in:{$this->mediciones_pagina}",

            // Tipografía
            'tipografia' => ['required','array:fuente,tamano,medicion'],
            'tipografia.fuente' => "in:{$this->nombres_fuentes}",
            'tipografia.tamano' => 'numeric',
            'tipografia.medicion' => "in:{$this->mediciones_fuente}",

            // Informacion
            'informacion' => ['required','array'],

            // Extra
            'texto_final' => ['nullable','string'],
            'desactivar' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            // Guía
            'nombre.required' => __('Escribe el nombre de la guía de impresión'),
            'nombre.unique' => __('Escribe un nombre diferente a la guía de impresión'),

            // Formato
            'formato.required' => __('Configura el formato'),
            'formato.array' => __('Configura un formato válido de ancho, altura y medicion'),
            'formato.ancho.numeric' => __('Escribe el ancho de página'),
            'formato.alto.numeric' => __('Escribe el alto de página'),
            'formato.medicion.in' => __('Selecciona una medición válida de página'),

            // Márgenes
            'margenes.array' => __('Configura márgenes válidos'),
            'margenes.arriba.numeric' => __('Escribe un margen válido de arriba'),
            'margenes.derecha.numeric' => __('Escribe un margen válido de derecha'),
            'margenes.abajo.numeric' => __('Escribe un margen válido de abajo'),
            'margenes.izquierda.numeric' => __('Escribe un margen válido de izquierda'),
            'margenes.medicion.in' => __('Selecciona un medición válida para margenes'),

            // Tipografía
            'tipografia.required' => __('Configura la tipografía'),
            'tipografia.array' => __('Configura una tipografía válida'),
            'tipografia.fuente.in' => __('Selecciona el tipo válido de fuente'),
            'tipografia.tamano.numeric' => __('Escribe el tamaño de la fuente'),
            'tipografia.medicion.in' => __('Selecciona una medición válida de fuente'),

            // Informacion
            'informacion.required' => __('Selecciona la información para la guía'),
            'informacion.array' => __('Selecciona una informacion válida'),
        ];
    }
}
