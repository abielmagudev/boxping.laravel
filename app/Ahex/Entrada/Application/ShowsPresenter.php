<?php

namespace App\Ahex\Entrada\Application;

use Illuminate\Http\Request;
use App\Entrada;

class ShowsPresenter
{
    /**
     * Todos los shows disponibles
     * 
     * El array se divide en nombre de la plantilla => Texto del botón
     * 
     * Los nombres de las plantillas deben de coincidir con los nombres de archivos views 
     * en la ruta "entradas/show"
     * 
     * @var array
     */
    private $all_shows = [
        'informacion' => 'Información',
        'etapas' => 'Etapas',
        'actualizaciones' => 'Actualizaciones',
    ];


    /**
     * EL nombre del show default, en caso de no existir a lo que se soilicita
     * 
     * @var string
     */
    private $default_show = 'informacion';


    /**
     * Nombre de variable para hacer y obtener las peticiones HTTP/GET
     * 
     * En el metodo links(), se establecerá para hacer la peticion HTTP/GET
     * el nombre de la variable y asignarle el nombre del show
     *  
     * Al instanciar, se buscará este nombre de variable en el $request
     * para validar la peticion del show que se renderizará
     * 
     * @var string
     */
    private $request_varname = 'mostrar';


    /**
     * Contiene el valor del nombre del show obtendo del $request
     * 
     * @var string
     */
    private $request_show;


    /**
     * Variable que contiene el modelo Entrada que se utlizará
     * para generar las rutas de peticiones HTTP/GET
     * 
     * @var string
     */
    private $entrada;



    /**
     * Inicia la instancia de ShowsPresenter
     * 
     * Se requiere el modelo Entrada y la peticion $request
     * para inicializar las propiedades necesarias.
     * 
     * Se asiga valor al $request_show, obtenido del $request por medio del nombre de la variable
     * asignado en $request_varname, caso contrario, $request_show tendrá valor NULL
     * 
     * @param \App\Entrada
     * @param \Illuminate\Http\Request
     * 
     * @return void
     */
    public function __construct(Entrada $entrada, Request $request)
    {
        $this->request_show = $request->get( $this->request_varname ); 
        $this->entrada = $entrada;
    }


    /**
     * Retorna el nombre del show
     * 
     * En caso de no existir el valor de $request_show en $all_shows
     * retorna el valor de $default_show
     * 
     * @return string
     */
    public function showname()
    {
        if(! array_key_exists($this->request_show, $this->all_shows) )
            return $this->default_show;

        return $this->request_show;
    }

    /**
     * Generador de links(botones) de shows
     * 
     * Array de links formateados con la etiqueta "a" para rendereizarse en la view
     * 
     * El primer argumento es la asignacion de clases al link
     * El segundo argumento es la clase que se usará para el link actual o activado
     * 
     * @param string $classes: CSS selectors name
     * @param string $active: CSS selector name
     * 
     * @return array
     */
    public function links(string $classes = 'btn btn-outline-primary', string $active = 'active')
    {
        $links = [];
        $showname_cache = $this->showname();

        foreach($this->all_shows as $show => $title)
        {
            $route = route('entradas.show', [$this->entrada, $this->request_varname => $show]);
            $is_active = $showname_cache <> $show ?: $active;
            $aria = $showname_cache <> $show ?: "aria-current='page'";

            array_push($links, "<a href='{$route}' class='{$classes} {$is_active}' {$aria}>{$title}</a>");
        }

        return $links;
    }
}
