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
        'active' => request()->is('salidas*') || request()->is('transportadoras*') || request()->is('incidentes*'),
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
        'title' => 'trayectoria',
        'route' => route('destinatarios.index'),
        'active' => request()->is('destinatarios*') || request()->is('remitentes*'),
    ],
);
?>

<div class="card border-0 bg-transparent">
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($menu as $item)
            <a href="{{ $item->route }}" class="list-group-item list-group-item-action border-0 rounded {{ $item->active ? 'bg-light' : '' }}">{{ ucfirst($item->title) }}</a>
            @endforeach
        </div>
    </div>
</div>
