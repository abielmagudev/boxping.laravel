<?php

$settings = (object) [
    'route' => $route,
    'title' => isset($title) && is_string($title) ? $title : 'Buscar remitentes',
    'input' => isset($input) && is_string($input) ? $input : 'buscar',
    'slot' => $slot ?? '',
];

?>
@component('@.bootstrap.modal', [
    'header_close' => true,
    'id' => 'modalSearchRemitentes',
    'title' => $settings->title,
])
    <br>
    <form action="<?= $settings->route ?>" method="get" autocomplete="off">
        {!! $settings->slot !!}
        <input type="search" name="<?= $settings->input ?>" placeholder="Escribe el nombre, dirección, teléfono..." id="inputBuscarRemitentes" class="form-control rounded-pill" required>
    </form>
    <br>
@endcomponent
