<?php 

if(! isset($consolidado_colores) )
    $consolidado_colores = config('system.consolidated.colors');

$bg_consolidado = $consolidado_colores[ $consolidado->abierto ];

?>

<span style="background-color: {{ $bg_consolidado }}" class="badge text-white rounded-pill p-2">
    {{ $consolidado->abierto ? 'Abierto' : 'Cerrado' }}
</span>
