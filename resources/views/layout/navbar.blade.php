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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="lead">Boxping</span>
        </a>

        <!-- Toggle collapse -->
        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- In collapse -->
        <div class="collapse navbar-collapse d-none" id="navbarContent">
            <ul class="navbar-nav">
                <li class="nav-item active d-none">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>     
        </div>
        
        <!-- Out collapse -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg" aria-labelledby="navbarDropdownUser">
                    <a class="dropdown-item" href="#">Cuenta</a>
                    <a class="dropdown-item" href="#">Preferencias</a>
                    <a class="dropdown-item text-danger" href="#">Salir</a>
                </div>
            </li>
        </ul>

    </div>
</nav>
