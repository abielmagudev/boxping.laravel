<?php
$menu = array(
    (object) [
        'title' => 'escritorio',
        'route' => route('escritorio'),
        'active' => request()->is('escritorio*') || request()->is('/'),
    ],
    (object) [
        'title' => 'consolidados',
        'route' => route('consolidados.index'),
        'active' => request()->is('consolidados*'),
    ],
    (object) [
        'title' => 'entradas',
        'route' => route('entradas.index'),
        'active' => request()->is('entradas*'),
    ],
    (object) [
        'title' => 'salidas',
        'route' => route('salidas.index'),
        'active' => request()->is('salidas*'),
    ],
    (object) [
        'title' => 'clientes',
        'route' => route('clientes.index'),
        'active' => request()->is('clientes*'),
    ],
    (object) [
        'title' => 'etapas',
        'route' => route('etapas.index'),
        'active' => request()->is('etapas*') || request()->is('alertas*'),
    ],
    (object) [
        'title' => 'importación',
        'route' => route('conductores.index'),
        'active' => request()->is('conductores*') || request()->is('vehiculos*'),
    ],
    (object) [
        'title' => 'reempaque',
        'route' => route('reempacadores.index'),
        'active' => request()->is('reempacadores*') || request()->is('codigosr*'),
    ],
    (object) [
        'title' => 'trayectorias',
        'route' => route('remitentes.index'),
        'active' => request()->is('destinatarios*') || request()->is('remitentes*'),
    ],
    (object) [
        'title' => 'transportadoras',
        'route' => route('transportadoras.index'),
        'active' => request()->is('transportadoras*') || request()->is('incidentes*'),
    ],
    (object) [
        'title' => 'Usuarios',
        'route' => route('usuarios.index'),
        'active' => request()->is('usuarios*'),
    ],
    (object) [
        'title' => 'Configuración',
        'route' => route('configuraciones.index'),
        'active' => request()->is('configuraciones*'),
    ],
);
?>

<div class="list-group list-group-flush">
    @foreach($menu as $item)
    <a href="{{ $item->route }}" class="list-group-item list-group-item-action border-0 {{ $item->active ? 'active' : '' }}">{{ ucfirst($item->title) }}</a>
    @endforeach
</div>
