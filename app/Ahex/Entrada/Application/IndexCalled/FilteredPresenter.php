<?php

namespace App\Ahex\Entrada\Application\IndexCalled;

use Illuminate\Http\Request;

class FilteredPresenter extends FilteredContainer
{
    const PRESENTER_NOT_FOUND = false;

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $name)
    {
        if(! self::exists($name) )
            return self::PRESENTER_NOT_FOUND;

        $classname = self::classname($name);
        return new $classname($this->request);
    }

    public function all()
    {
        $selfie = $this;

        return array_map( function ($classname) use ($selfie) {
            return $selfie->get($classname);
        }, self::$filtered);
    }

    public function request(array $except = null)
    {
        $filters = isset($except) ? array_keys($this->request->except($except)) : $this->request->keys();

        foreach($filters as $filter)
        {
            if(! self::exists($filter) )
                continue;

            $presenters[] = $this->get($filter);
        }

        return $presenters ?? [];
    }
}
