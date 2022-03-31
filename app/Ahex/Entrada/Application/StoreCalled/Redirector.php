<?php

namespace App\Ahex\Entrada\Application\StoreCalled;

use App\Entrada;

class Redirector
{
    public $actions = [
        'crear' => 'createRoute',
        'finalizar' => 'finishedRoute',
    ];

    public $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    /**
     * Retorna la ruta solicitada por la peticion "siguiente" (next)
     * 
     * Si existe la "accion siguiente", ejecuta el metodo especifico para 
     * retornar su ruta configurada.
     * 
     * En caso de no existir la accion de siguiente, finaliza la creación de entradas y 
     * regresa a su origen correspondiente, es decir, al consolidado o al index de entradas.
     *
     * @param string|null $next
     * @return string route
     */
    public function route(string $next = null)
    {
        if(! isset($this->actions[$next]) )
            return $this->finishedRoute();

        return call_user_func([$this, $this->actions[$next]]);
    }

    /**
     * Crear entrada con o sin consolidado
     * 
     * El parametro consolidado de la ruta entradas.create puede estar presente o no,
     * es decir, puede ser nulo, vacio o id del consolidado que corresponde a la entrada.
     * 
     * En caso de ser nulo consolidado_id, no validará el consolidado en el request, por lo que
     * permitira crear una entrada sin consolidar.
     * 
     * En caso contrario, validará el consolidado en el request, para poder crear
     * una entrada consolidada.
     *
     * @return string route
     */
    public function createRoute()
    {
        return route('entradas.create', $this->entrada->consolidado_id);
    }

    /**
     * Retorna la ruta de finalizacion para regresar al index correspondiente
     * 
     * Si la entrada es consolidada, retorna al show del consolidado que pertenece a la entrada
     * 
     * En caso contrario, regresa al index de entradas.
     *
     * @return string route
     */
    public function finishedRoute()
    {
        return $this->entrada->hasConsolidado()
                ? route('consolidados.show', $this->entrada->consolidado_id)
                : route('entradas.index');
    }

    /**
     * Retorna el nombre del input para recuperar su valor con la funcion old()
     * 
     * Si la entrada no tiene consolidado, retorna el nombre del input para predeterminar
     * su valor en el formulario.
     * 
     * En caso contrario, retorna null ya que el los valores predeterminados se obtiene
     * a traves del consolidado de la entrada.
     *
     * @return string || null
     */
    public function feedback()
    {
        return $this->entrada->hasConsolidado() ?: 'cliente';
    }
}
