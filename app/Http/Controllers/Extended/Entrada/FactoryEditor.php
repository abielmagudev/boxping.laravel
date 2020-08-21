<?php 

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Factory;

class FactoryEditor extends Factory
{
    public static function make($editor_name, $params = [])
    {       
        self::setProps([
            'classpath' => app_path('Http/Controllers/Extended/Entrada'),
            'classname' => 'Editor' . ucfirst( strtolower($editor_name) ),
            'namespace' => __NAMESPACE__,
        ]);

        return self::instantiante($params);
    }
}
