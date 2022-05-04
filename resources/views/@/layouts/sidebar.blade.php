<?php
$menu = array(
    (object) [
        'title' => 'Escritorio',
        'route' => route('escritorio'),
        'active' => request()->is('escritorio*') || request()->is('/'),
        'permissions' => 'escritorio',
    ],
    (object) [
        'title' => 'Consolidados',
        'route' => route('consolidados.index'),
        'active' => request()->is('consolidados*'),
        'permissions' => 'consolidados',
    ],
    (object) [
        'title' => 'Entradas',
        'route' => route('entradas.index'),
        'active' => request()->is('entradas*'),
        'permissions' => 'entradas',
    ],
    (object) [
        'title' => 'Salidas',
        'route' => route('salidas.index'),
        'active' => request()->is('salidas*'),
        'permissions' => 'salidas',
    ],
    (object) [
        'title' => 'Clientes',
        'route' => route('clientes.index'),
        'active' => request()->is('clientes*'),
        'permissions' => 'clientes',
    ],
    (object) [
        'title' => 'Etapas',
        'route' => route('etapas.index'),
        'active' => request()->is('etapas*') || request()->is('alertas*'),
        'permissions' => 'etapas',
    ],
    (object) [
        'title' => 'Alertas',
        'route' => route('alertas.index'),
        'active' => request()->is('etapas*') || request()->is('alertas*'),
        'permissions' => 'alertas',
    ],
    (object) [
        'title' => 'Conductores',
        'route' => route('conductores.index'),
        'active' => request()->is('conductores*') || request()->is('vehiculos*'),
        'permissions' => 'conductores',
    ],
    (object) [
        'title' => 'Vehículos',
        'route' => route('vehiculos.index'),
        'active' => request()->is('conductores*') || request()->is('vehiculos*'),
        'permissions' => 'vehiculos',
    ],
    (object) [
        'title' => 'Reempacadores',
        'route' => route('reempacadores.index'),
        'active' => request()->is('reempacadores*') || request()->is('codigosr*'),
        'permissions' => 'reempacadores',
    ],
    (object) [
        'title' => 'Códigos Reempacado',
        'route' => route('codigosr.index'),
        'active' => request()->is('reempacadores*') || request()->is('codigosr*'),
        'permissions' => 'codigosr',
    ],
    (object) [
        'title' => 'Destinatarios',
        'route' => route('destinatarios.index'),
        'active' => request()->is('destinatarios*') || request()->is('remitentes*'),
        'permissions' => 'destinatarios',
    ],
    (object) [
        'title' => 'Remitentes',
        'route' => route('remitentes.index'),
        'active' => request()->is('destinatarios*') || request()->is('remitentes*'),
        'permissions' => 'remitentes',
    ],
    (object) [
        'title' => 'Transportadoras',
        'route' => route('transportadoras.index'),
        'active' => request()->is('transportadoras*') || request()->is('incidentes*'),
        'permissions' => 'transportadoras',
    ],
    (object) [
        'title' => 'Incidentes',
        'route' => route('incidentes.index'),
        'active' => request()->is('transportadoras*') || request()->is('incidentes*'),
        'permissions' => 'incidentes',
    ],
    (object) [
        'title' => 'Guías de impresión',
        'route' => route('guias_impresion.index'),
        'active' => request()->is('guias_impresion*'),
        'permissions' => 'impresiones',
    ],
    (object) [
        'title' => 'Usuarios',
        'route' => route('usuarios.index'),
        'active' => request()->is('usuarios*'),
        'permissions' => 'users',
    ],
    (object) [
        'title' => 'Configuración',
        'route' => route('configuraciones.index'),
        'active' => request()->is('configuraciones*'),
        'permissions' => 'configuraciones',
    ],
);

$link = (object) [
    'inactive' => 'text-white',
    'active' => 'active bg-black bg-opacity-25 rounded-0',
];

?>

<aside class="bg-primary h-100" id="app-sidebar">
    <div class="text-white lead p-3">{{ config('app.name') }}</div>
    <br>
    <ul class="nav nav-pills flex-column">
    @foreach($menu as $item)
        @can( $item->permissions )      
        <li class="nav-item">
            <a href="{{ $item->route }}" class="nav-link {{ ! $item->active ? $link->inactive : $link->active }}">{{ $item->title }}</a>
        </li>
        @endcan
    @endforeach
    </ul>
</aside>
