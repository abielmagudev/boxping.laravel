<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

Abstract class Updater
{
    private $params_required = [
        'entrada',
        'request',
    ];

    protected $entrada;
    protected $request;

    final function __construct($params)
    {
        $this->hasRequiredParams($params);

        $this->entrada = $params['entrada'];
        $this->request = $params['request'];
    }

    private function hasRequiredParams($params)
    {
        $params_found = $this->findRequiredParams($params);

        if( count($params_found) < count($this->params_required) )
            throw new \Exception('Updater does not have all the necessary parameters.');

        return true;
    }

    private function findRequiredParams($params)
    {
        return array_filter($this->params_required, function ($required) use ($params) {
            return array_key_exists($required, $params) ;
        });
    }

    public function save()
    {
        return $this->entrada->fill( $this->values() )->save();
    }

    abstract public function validate();
    abstract public function values();
    abstract public function redirect($saved);
}
