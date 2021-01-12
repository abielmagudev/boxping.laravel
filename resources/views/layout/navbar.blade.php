<?php
$dropdown = array(
    (object) [
        'title' => 'consolidados',
        'route' => route('consolidados.index'),
    ],
    (object) [
        'title' => 'entradas',
        'route' => route('entradas.index'),
    ],
    (object) [
        'title' => 'etapas',
        'route' => route('etapas.index'),
    ],
    (object) [
        'title' => 'alertas',
        'route' => route('alertas.index'),
    ],
    (object) [
        'title' => 'clientes',
        'route' => route('clientes.index'),
    ],
    (object) [
        'title' => 'destinatarios',
        'route' => route('destinatarios.index'),
    ],
    (object) [
        'title' => 'remitentes',
        'route' => route('remitentes.index'),
    ],
    (object) [
        'title' => 'transportadoras',
        'route' => route('transportadoras.index'),
    ],
    (object) [
        'title' => 'vehiculos',
        'route' => route('vehiculos.index'),
    ],
    (object) [
        'title' => 'conductores',
        'route' => route('conductores.index'),
    ],
    (object) [
        'title' => 'códigos R',
        'route' => route('codigosr.index'),
    ],
    (object) [
        'title' => 'reempacadores',
        'route' => route('reempacadores.index'),
    ],
    (object) [
        'title' => 'incidentes',
        'route' => route('incidentes.index'),
    ],
    (object) [
        'title' => 'salidas',
        'route' => route('salidas.index'),
    ],
);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-size:1rem">
        <span>Boxping</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active d-none">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Navegacion</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach($dropdown as $item)
                    <a class="dropdown-item" href="{{ $item->route }}">{{ ucfirst($item->title) }}</a>
                @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>
