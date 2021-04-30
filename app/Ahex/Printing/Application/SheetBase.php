<?php

namespace App\Ahex\Printing\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class SheetBase
{
    /**
     * 
     * $model: El modelo que se usara para obtener el contenido de la hoja
     * $request: La solicitud recibida con los parametros necesarios para su contenido
     * $sheet: El nombre del metodo(sheet) a ejecutar
     * $content: El contenido obtenido de la ejecucion del metodo(sheet) de la clase hija
     * $layout: El layout de la hoja, si es single o multiple, (Multiple - Para una Collection)
     * 
     */
    protected $model;
    protected $request;
    protected $sheet;
    public $content;
    public $layout;

    public function __construct(Request $request, Model $model = null)
    {
        $this->model   = $model;
        $this->request = $request;
        $this->layout  = $this->getLayout();
        $this->sheet   = $this->getSheet();
        $this->content = $this->getContent();
    } 

    /**
     * 
     * Verifica si requiere una hoja(sheet) especifica de la peticion o si esta definida la hoja predeterminada
     * Si no es posible llamar(ejecutar) el metodo(sheet) por peticion, devuelve la hoja predeterminada(default_sheet)
     * 
     * Devuelve el nombre del metodo solicitado(hoja)
     * 
     * @return string Nombre del metodo(sheet) a ejecutar
     * 
     */
    private function getSheet()
    {
        if( !$this->request->exists('hoja') && !isset($this->default_sheet) )
            return abort(404);

        if(! is_callable([$this, $this->request->hoja]) )
            return $this->default_sheet;

        return $this->request->get('hoja');
    }

    /**
     * 
     * Ejecuta el metodo(sheet) de la peticion de la clase hija
     * 
     * @return array El contenido requerido por la hoja solicitada que ha sido ejecutada(call_user_func)
     * 
     */
    private function getContent()
    {
        return call_user_func([$this, $this->sheet]);
    }

    /**
     * 
     * Funcion que busca la propiedad 'multiple_layout' que contiene los metodos(sheets) de la clase,
     * en la cual estan definidos como tipo layout multiple.
     * 
     * Si no esta definida esta propiedad, automaticamente será layout single.
     * 
     * Property child: "multiple_layout"
     * Type: Array
     * Scope: Protected
     * 
     * @return string type layout: single, multiple.
     */
    private function getLayout()
    {
        if( property_exists($this, 'multiple_layout') )
        {
            if( $this->isMultipleLayout($this->request->get('hoja'), $this->multiple_layout) )
                return 'printing.multiple';
        }   
        
        return 'printing.single';
    }

    /**
     * 
     * Confirma si el metodo(sheet) de la peticion(request) esta dentro 
     * de la propiedad 'multiple_layout'.
     * 
     * Argument one: String nombre de la hoja en la peticion
     * Argument two: String|Array lista o texto para comparar con la peticion
     * 
     * @return boolean 
     * 
     */
    private function isMultipleLayout(string $sheetname = null, $class_sheetnames)
    {
        if( is_array($class_sheetnames) )
            return in_array($sheetname, $class_sheetnames);

        return $sheetname === $class_sheetnames;
    }
}
