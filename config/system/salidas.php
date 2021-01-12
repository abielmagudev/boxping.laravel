<?php

return array(

    'cobertura' => [
        'domicilio' => [
            'descripcion' => 'Dirección del destinatario',
        ],
        'ocurre'    => [
            'descripcion' => 'Dirección de la transportadora',
        ],
    ],

    'status' => [
        'en espera' => [
            'descripcion' => 'Recopilando información para el envio',
            'color' => 'primary',
        ],
        'en ruta'   => [
            'descripcion' => 'Envio en proceso hacia su destino',
            'color' => 'warning',
        ],
        'arribo'    => [
            'descripcion' => 'Finalizo en el envio a su destino',
            'color' => 'success',
        ],
        'entregado' => [
            'descripcion' => 'Paquete recibido por el destinatario',
            'color' => 'dark',
        ],
    ],
);
