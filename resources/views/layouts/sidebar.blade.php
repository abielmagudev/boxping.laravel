<?php
$menu = array(
    (object) [
        'title' => 'Escritorio',
        'route' => route('escritorio'),
        'active' => request()->is('escritorio*') || request()->is('/'),
    ],
    (object) [
        'title' => 'Consolidados',
        'route' => route('consolidados.index'),
        'active' => request()->is('consolidados*'),
    ],
    (object) [
        'title' => 'Entradas',
        'route' => route('entradas.index'),
        'active' => request()->is('entradas*'),
    ],
    (object) [
        'title' => 'Salidas',
        'route' => route('salidas.index'),
        'active' => request()->is('salidas*'),
    ],
    (object) [
        'title' => 'Clientes',
        'route' => route('clientes.index'),
        'active' => request()->is('clientes*'),
    ],
    (object) [
        'title' => 'Etapas',
        'route' => route('etapas.index'),
        'active' => request()->is('etapas*') || request()->is('alertas*'),
    ],
    (object) [
        'title' => 'Alertas',
        'route' => route('alertas.index'),
        'active' => request()->is('etapas*') || request()->is('alertas*'),
    ],
    (object) [
        'title' => 'Importación',
        'route' => route('conductores.index'),
        'active' => request()->is('conductores*') || request()->is('vehiculos*'),
    ],
    (object) [
        'title' => 'Reempacadores',
        'route' => route('reempacadores.index'),
        'active' => request()->is('reempacadores*') || request()->is('codigosr*'),
    ],
    (object) [
        'title' => 'Códigos Reempacado',
        'route' => route('codigosr.index'),
        'active' => request()->is('reempacadores*') || request()->is('codigosr*'),
    ],
    (object) [
        'title' => 'Trayectorias',
        'route' => route('remitentes.index'),
        'active' => request()->is('destinatarios*') || request()->is('remitentes*'),
    ],
    (object) [
        'title' => 'Transportadoras',
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
            <a href="{{ $item->route }}" class="nav-link {{ ! $item->active ? 'text-white' : 'active text-white' }}">{{ $item->title }}</a>
        </li>
    @endforeach
    </ul>
</aside>
