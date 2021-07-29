<?php

return [
    'guia' => [
        'hoja_papel' => [
            'tamanos' => [
                'A4' => [
                    'etiqueta' => 'A4',
                    'ancho' => 210,
                    'altura' => 297,
                    'mediciones' => ['mm' => 'Milimetros'],
                ],
                'B5' => [
                    'etiqueta' => 'B5',
                    'ancho' => 182,
                    'altura' => 257,
                    'mediciones' => ['mm' => 'Milimetros'],
                ],
                'letter' => [
                    'etiqueta' => 'Carta',
                    'ancho' => 8.5,
                    'altura' => 11,
                    'mediciones' => ['in' => 'Pulgadas'],
                ],
                'folio' => [
                    'etiqueta' => 'Folio',
                    'ancho' => 8.5,
                    'altura' => 13,
                    'mediciones' => ['in' => 'Pulgadas'],
                ],
                'legal' => [
                    'etiqueta' => 'Legal',
                    'ancho' => 8.5,
                    'altura' => 14,
                    'mediciones' => ['in' => 'Pulgadas'],
                ],
                'tabloid' => [
                    'etiqueta' => 'Tabloide',
                    'ancho' => 11,
                    'altura' => 17,
                    'mediciones' => ['in' => 'Pulgadas'],
                ],
                'custom' => [
                    'etiqueta' => 'Personalizado',
                    'ancho' => 0,
                    'altura' => 0,
                    'mediciones' => [
                        'mm' => 'Milimetros',
                        'cm' => 'Centimetros',
                        'in' => 'Pulgadas',
                    ],
                ],
            ],
            'margenes' => [
                'tamano' => 0,
                'mediciones' => [
                    'mm' => 'Milimetros',
                    'cm' => 'Centimetros',
                    'in' => 'Pulgadas',
                    'px' => 'Pixeles',
                ],
            ],
        ],
        'formato' => [
            'fuentes' => [
                'arial' => 'Arial',
                'courier' => 'Courier',
                'helvetica' => 'Helvetica',
                'times new roman' => 'Times New Roman',
                'verdana' => 'Verdana',
            ],
            'tamano' => 16,
            'mediciones' => [
                'px' => 'Pixeles',
                'pt' => 'Points',
                'em' => 'Ems',
            ],
            'interlineados' => [
                'medidas' => [1.0, 1.25, 1.5, 1.75, 2, 2.25, 2.5],
                'medicion' => 'pt',
            ],
        ],
        'contenido' => [
            'remitente' => [
                'nombre' => 'Nombre',
                'direccion' => 'Dirección',
                'postal' => 'Postal',
                'ciudad' => 'Ciudad',
                'estado' => 'Estado',
                'pais' => 'Pais',
                'telefono' => 'Teléfono',
                'notas' => 'Notas',
            ],
            'destinatario' => [
                'nombre' => 'Nombre',
                'direccion' => 'Dirección',
                'postal' => 'Postal',
                'ciudad' => 'Ciudad',
                'estado' => 'Estado',
                'pais' => 'Pais',
                'referencias' => 'Referencias',
                'telefono' => 'Teléfono',
                'notas' => 'Notas',
            ],
            'entrada' => [
                'numero' => 'Número',
                'consolidado' => 'Consolidado',
                'cliente' => 'Cliente',
                'reempacador' => 'Reempacador',
                'codigor' => 'Código R',
                'conductor' => 'Conductor',
                'vehiculo' => 'Vehículo',
            ],
            'etapa' => [
                'primera' => 'Primer registro',
                'ultima' => 'Último registro',
                'peso' => 'Peso',
                'ancho' => 'Ancho',
                'altura' => 'Altura',
                'largo' => 'Largo',
            ],
            'salida' => [
                'rastreo' => 'Rastreo',
                'confirmacion' => 'Confirmación',
                'cobertura' => 'Cobertura',
                'direccion' => 'Dirección',
                'postal' => 'Postal',
                'ciudad' => 'Ciudad',
                'estado' => 'Estado',
                'pais' => 'Pais',
                'notas' => 'Notas',
            ],
        ],
    ],
];
