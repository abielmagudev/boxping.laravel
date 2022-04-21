<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;
// use App\Ahex\GuiaImpresion\Application\InformantsMananger;

class GuiaImpresionSaveRequest extends FormRequest
{
    private $guia_impresion_actual;
    private $in_list = [];

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->guia_impresion_actual = $this->guia->id ?? 0;

        $this->in_list = [
            'fuentes' => PageDesigner::allFonts(','),
            'mediciones_fuente' => PageDesigner::allFontMeasurements(','),
            'mediciones_pagina' => PageDesigner::allMeasurements(','),
            'tipos_alineacion' => PageDesigner::allAlignments(','),
            // 'tipos_descripcion' => InformantsMananger::descriptionTypes(','),
        ];
    }

    public function rules()
    {
        return [
            // Guia
            'nombre' => ['required',"unique:guias_impresion,nombre,{$this->guia_impresion_actual}"],
            'descripcion' => ['nullable','string'],

            // Formato
            'formato' => ['required','array:ancho,alto,medicion'],
            'formato.alto' => 'numeric',
            'formato.ancho' => 'numeric',
            'formato.medicion' => "in:{$this->in_list['mediciones_pagina']}",

            // Márgenes
            'margenes' => ['array:arriba,derecha,abajo,izquierda,medicion'],
            'margenes.abajo' => ['nullable','numeric'],
            'margenes.arriba' => ['nullable','numeric'],
            'margenes.derecha' => ['nullable','numeric'],
            'margenes.izquierda' => ['nullable','numeric'],
            'margenes.medicion' => "in:{$this->in_list['mediciones_pagina']}",

            // Tipografía
            'tipografia' => ['required','array:alineacion,fuente,tamano,medicion'],
            'tipografia.alineacion' => "in:{$this->in_list['tipos_alineacion']}",
            'tipografia.fuente' => "in:{$this->in_list['fuentes']}",
            'tipografia.medicion' => "in:{$this->in_list['mediciones_fuente']}",
            'tipografia.tamano' => 'numeric',

            // Informacion
            'informacion' => ['required','array'],
            'informacion_adicional' => ['nullable','string'],
            // 'tipo_descripcion' => ['nullable',"in:{$this->in_list['tipos_descripcion']}"],

            // Extra
            'resetear' => 'boolean',
            'desactivar' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            // Guía
            'nombre.required' => __('Escribe el nombre de la guía de impresión'),
            'nombre.unique' => __('Escribe un nombre diferente para la guía de impresión'),

            // Formato
            'formato.required' => __('Configura el formato'),
            'formato.array' => __('Configura un formato de ancho, alto y medicion válido'),
            'formato.alto.numeric' => __('Escribe el alto de página'),
            'formato.ancho.numeric' => __('Escribe el ancho de página'),
            'formato.medicion.in' => __('Selecciona una medición de página válida'),

            // Márgenes
            'margenes.array' => __('Configura márgenes válidos'),
            'margenes.abajo.numeric' => __('Escribe un margen válido para abajo'),
            'margenes.arriba.numeric' => __('Escribe un margen válido para arriba'),
            'margenes.derecha.numeric' => __('Escribe un margen válido para derecha'),
            'margenes.izquierda.numeric' => __('Escribe un margen válido para izquierda'),
            'margenes.medicion.in' => __('Selecciona una medición de margenes válida'),

            // Tipografía
            'tipografia.required' => __('Configura la tipografía'),
            'tipografia.array' => __('Configura una tipografía de alineacion, fuente, tamaño y medición válida'),
            'tipografia.alineacion.in' => __('Selecciona una alineacion válida'),
            'tipografia.fuente.in' => __('Selecciona una fuente válida'),
            'tipografia.medicion.in' => __('Selecciona una medición de fuente válida'),
            'tipografia.tamano.numeric' => __('Escribe el tamaño de la fuente'),

            // Informacion
            'informacion.required' => __('Debe contener al menos una información para la página'),
            'informacion.array' => __('Selecciona una informacion válida'),
            // 'tipo_descripcion.in' => __('Selecciona un tipo de descripción válido de información'),
        ];
    }
}
