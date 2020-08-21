<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Factory;

class FactoryUpdater extends Factory
{
    public static function make($updater_name, $params = [])
    {       
        self::setProps([
            'classpath' => app_path('Http/Controllers/Extended/Entrada'),
            'classname' => 'Updater' . ucfirst( strtolower($updater_name) ),
            'namespace' => __NAMESPACE__,
        ]);

        return self::instantiante($params);
    }
}
