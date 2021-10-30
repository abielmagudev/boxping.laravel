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
        'title' => 'Guías de impresión',
        'route' => route('guias_impresion.index'),
        'active' => request()->is('guias_impresion*'),
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

<aside class="col-sm col-sm-2 p-3 bg-primary bg-gradient" id="app-sidebar">
    <p class="text-white text-center lead">{{ config('app.name') }}</p>
    <br>
    <ul class="nav nav-pills flex-column small">
    @foreach($menu as $item)
        <li class="nav-item">
            <a href="{{ $item->route }}" class="nav-link {{ ! $item->active ? 'text-white' : 'active text-white' }}">{{ ucfirst($item->title) }}</a>
        </li>
    @endforeach
    </ul>
</aside>
