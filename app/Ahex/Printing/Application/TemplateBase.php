<?php

namespace App\Ahex\Printing\Application;

abstract class TemplateBase
{
    protected $content;
    protected $model;

    public function __construct($sheet, $model)
    {
        $this->model   = $model;
        $this->content = $this->setContent($sheet);
    }

    public function content()
    {
        return $this->content;
    }

    abstract public function setContent($sheet);
}
