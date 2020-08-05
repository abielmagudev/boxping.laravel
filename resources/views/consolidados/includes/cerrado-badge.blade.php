<?php 

if(! isset($consolidado_colores) )
    $consolidado_colores = config('system.consolidated.colors');
?>

<span class="badge text-white rounded-pill p-2" 
    style="background-color: {{ $consolidado_colores[ $consolidado->cerrado ] }}">
    {{ $consolidado->cerrado ? 'Cerrado' : 'Abierto' }}
</span>
