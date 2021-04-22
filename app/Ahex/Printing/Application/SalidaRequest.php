<?php

namespace App\Ahex\Printing\Application;

class SalidaRequest implements RequestSetupInterface
{
    public function rules()
    {
        return [
            'hoja' => [
                'nullable', 
            ],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
