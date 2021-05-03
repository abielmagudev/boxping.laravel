<?php

namespace App\Ahex\Printing\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class SheetBase
{
    /**
     * 
     * $model: Modelo para obtener el contenido de la hoja.
     * $request: Solicitud recibida con reglas(opcionales) para filtrar el contenido.
     * 
     */
    protected $model;
    protected $request;
    protected $default_sheet;

    public function __construct(Model $model, Request $request)
    {
        $this->model   = $model;
        $this->request = $request;
    } 

    /**
     * 
     * 1ro: intentara ejecutar la hoja(metodo) de la clase que se recibio por request
     * 2do: intentara ejecutar la hoja(metodo) predeterminado de la clase
     * 3ro: Aborta la la ejecucion
     * 
     * @return array Parameters for the sheet
     */
    public function content()
    {
        if( method_exists($this, $this->request->hoja) )
            return call_user_func([$this, $this->request->hoja]);
            
        if( method_exists($this, $this->default_sheet) )
            return call_user_func([$this, $this->default_sheet]);

        return abort(404);
    }

    /**
     * 
     * Instancia una clase hija(called) a traves de una funcion estatica, para evitar el keyword "new"
     * Por ejemplo, pasar un nuevo objeto por parametro de una funcion
     * 
     * function( new self($model, $request) ) => function( Class::build($model, $request) )
     * 
     * @return object Class child
     */
    public static function build(Model $model, Request $request)
    {
        $called_class = get_called_class();
        return new $called_class($model, $request);
    }
}
