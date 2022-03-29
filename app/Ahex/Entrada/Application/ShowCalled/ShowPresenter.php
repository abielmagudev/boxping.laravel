<?php

namespace App\Ahex\Entrada\Application\ShowCalled;

use App\Entrada;

class ShowPresenter
{
    /**
     * Todos los shows disponibles
     * 
     * ['Nombre de la plantilla' => 'Texto del botón']
     * 
     * @var array
     */
    public static $all = [
        'informacion' => 'Información',
        'etapas' => 'Etapas',
        'actualizaciones' => 'Actualizaciones',
    ];


    /**
     * El nombre del show default, en caso de no existir el que se soilicita
     * 
     * @var string
     */
    public static $default = 'informacion';


    /**
     * Nombre de la plantilla solicitada por petición GET
     * 
     * @var string
     */
    private $showname;


    /**
     * Variable que contiene el modelo Entrada que se utlizará
     * para generar las rutas de peticiones HTTP/GET
     * 
     * @var string
     */
    private $entrada;


    /**
     * Para instanciar se requiere el modelo Entrada y el nombre de la plantilla
     * a renderizar por la plantilla show
     * 
     * En caso de no existir el $name en self::$all
     * retorna el valor de self::$default
     * 
     * @param \App\Entrada
     * @param string $showname
     * 
     * @return void
     */
    public function __construct(Entrada $entrada, string $name = null)
    {
        $this->entrada = $entrada;
        $this->showname = ! array_key_exists($name, self::$all) ? self::$default : $name;
    }


    /**
     * Retorna el valor de showname
     * 
     * @return string
     */
    public function showname()
    {
        return $this->showname;
    }

    /**
     * Retorna un array de objetos links de la ruta show
     * 
     * Propiedades de cada objecto
     * actived: si es o no el link de la petición actual
     * route: ruta(url) del show para la petición HTTP/GET
     * title: texto para el botón o link a mostrar
     * 
     * @return array
     */
    public function links()
    {
        foreach(self::$all as $showname => $title)
        {
            $links[] = (object) [
                'actived' => $this->showname === $showname,
                'route' => route('entradas.show', [$this->entrada, $showname]),
                'title' => $title,
            ];
        }

        return $links;
    }
}
