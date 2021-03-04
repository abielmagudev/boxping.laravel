<?php
$menu = array(
    (object) [
        'title' => 'escritorio',
        'route' => route('escritorio'),
        'active' => true,
    ],
    (object) [
        'title' => 'consolidados',
        'route' => route('consolidados.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'entradas',
        'route' => route('entradas.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'salidas',
        'route' => route('salidas.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'clientes',
        'route' => route('clientes.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'etapas',
        'route' => route('etapas.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'importación',
        'route' => route('conductores.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'reempaque',
        'route' => route('reempacadores.index'),
        'active' => false,
    ],
    (object) [
        'title' => 'trayectoria',
        'route' => route('destinatarios.index'),
        'active' => false,
    ],
);
?>

<div class="card border-0 bg-transparent">
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($menu as $item)
            <a href="{{ $item->route }}" class="list-group-item list-group-item-action border-0 {{ $item->active ? '' : '' }}">{{ ucfirst($item->title) }}</a>
            @endforeach
        </div>
    </div>
</div>
