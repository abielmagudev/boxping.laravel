<?php

namespace App\Ahex\Zkeleton\Application;

abstract Class Factory
{
    protected $filepath;
    protected $classname;
    protected $namespace;

    protected function validate()
    {
        try {

            if( $this->notHasFilledProps() )
                throw new \Exception('Factory\'properties not has data.');

            if( $this->notExistsFile() )
                throw new \Exception('Factory\'file not exists.');

            if( $this->notFoundClassname() )
                throw new \Exception('Factory\'class not found. [' . $this->getClassname() . ']');

        } catch (Throwable $e) {
            return report($e);
        }

        return $this;
    }

    protected function notHasFilledProps()
    {
        $props  = get_object_vars($this);
        $filled = array_filter($props);

        return count($props) > count($filled);
    }

    protected function notExistsFile()
    {
        return ! file_exists( $this->getFilepath() );
    }

    protected function notFoundClassname()
    {
        return ! class_exists( $this->getClassname() );
    }

    protected function getFilepath()
    {
        return $this->filepath . '/' . $this->classname . '.php';
    }

    protected function getClassname()
    {
        return $this->namespace . '\\' . $this->classname;
    }

    public function build($params = null)
    {
        $Classname = $this->getClassname();

        if( ! is_null($params) )
            return new $Classname($params);

        return new $Classname;
    }
}
