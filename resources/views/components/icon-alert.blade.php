<?php

$settings = (object) [
    'color' => isset($color) ? $color : '#000',
    'nivel' => isset($nivel) ? $nivel : 'Sin nivel',
    'nombre' => isset($nombre) ? $nombre : 'Sin nombre',
    'descripcion' => isset($descripcion) ? $descripcion : 'Sin descripcion',
];

?>
<div class="d-inline-block" style="color:{{ $settings->color }}">
    <span data-toggle="tooltip" data-placement="top" title="{{ $settings->nombre }}">&#11044;</span>
</div>