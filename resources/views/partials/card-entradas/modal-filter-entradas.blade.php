<?php

$options = (object) [
    'fechas_horas'    => [
        'cualquier'   => '- Cualquier fecha y hora -',
        'actualizado' => 'Actualización',
        'creado'      => 'Creación',
        'confirmado'  => 'Confirmación',
        'importado'   => 'Importación',
        'reempacado'  => 'Reempacado',
    ],
    'ambitos' => [
        'cualquier' => '- Cualquier ámbito -',
        'consolidadas' => 'Consolidadas',
        'sin-consolidar' => 'Sin consolidar',
    ],
    'limite' => range(25,75,25),
];

$fieldset = (object) [
    'display' => request('fecha_hora', 'cualquier') <> 'cualquier' ?: 'd-none',
    'disabled' => request('fecha_hora', 'cualquier') <> 'cualquier' ?: 'disabled',
];

?>

<div class="d-inline">
    <!-- Button trigger modal -->
    <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modalFiltrosEntrada">{!! $icons->filter !!}</button>

    <!-- Modal -->
    <div class="modal fade" id="modalFiltrosEntrada" tabindex="-1" aria-labelledby="modalFiltrosEntrada" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalFiltrosEntradaLabel">Filtros de entradas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-start">
                    <form action="{{ $settings->routes->filtering }}" method="get" id="form-filtros-entradas">

                        <div class="mb-3">
                            <label for="select-filtro-ambito" class="form-label d-block small">Ámbito</label>
                            <select name="ambito" id="select-filtro-ambito" class="form-control">
                                @foreach ($options->ambitos as $value => $label)
                                <option value="{{ $value }}" {{ selectable(request('ambito'), $value) }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="select-filtro-cliente" class="form-label small">Cliente</label>
                            <select name="cliente" id="select-filtro-cliente" class="form-control">
                                <option value="cualquier" selected>- Cualquier cliente -</option>
                                @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ selectable(request('cliente'), $cliente->id) }}>{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="select-filtro-etapa" class="form-label small">Etapa</label>
                            <select name="etapa" id="select-filtro-etapa" class="form-control">
                                <option value="cualquier" selected>- Cualquier etapa -</option>
                                @foreach ($etapas as $etapa)
                                <option value="{{ $etapa->id }}" {{ selectable(request('etapa'), $etapa->id) }}>{{ $etapa->nombre }}</option>
                                @endforeach
                                <option value="ninguno">Ningúna etapa</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="select-filtro-fecha-hora" class="form-label small">Fecha y hora</label>
                            <select name="fecha_hora" id="select-filtro-fecha-hora" class="form-control">
                                @foreach($options->fechas_horas as $value => $label)
                                <option value="{{ $value }}" {{ selectable(request('fecha_hora'), $value) }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <fieldset class="{{ $fieldset->display }} mt-3 p-3 bg-light" id="fieldset-fechas-horas" {{ $fieldset->disabled }}>
                                <div class="mb-3">
                                    <label for="input-filtro-desde-fecha" class="form-label small">Desde</label>
                                    <div class="row g-2">
                                        <div class="col-sm">
                                            <input type="date" class="form-control" name="desde_fecha" value="{{ request('desde_fecha', date('Y-01-01')) }}" id="input-filtro-desde-fecha">
                                        </div>
                                        <div class="col-sm">
                                            <input type="time" class="form-control" name="desde_hora" value="{{ request('desde_hora', '00:00:00') }}" id="input-filtro-desde-hora">
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <label for="input-filtro-hasta-fecha" class="form-label small">Hasta</label>
                                    <div class="row g-2">
                                        <div class="col-sm">
                                            <input type="date" class="form-control" name="hasta_fecha" value="{{ request('hasta_fecha', date('Y-m-d')) }}" id="input-filtro-hasta-fecha">
                                        </div>
                                        <div class="col-sm">
                                            <input type="time" class="form-control" name="hasta_hora" value="{{ request('hasta_hora', '00:00:00') }}" id="input-filtro-hasta-hora">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="mb-3">
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="muestreo" value="completo" id="radio-filtro-muestreo-completo" checked>
                                <label class="form-check-label" for="radio-filtro-muestreo-completo">
                                    <span class="d-block">Mostrar resultados en una sola página completa.</span>
                                    <small class="text-muted">Desactivar para mostrar en paginación.</small>
                                </label>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" form="form-filtros-entradas" name="filter" value="{{ sha1( time() ) }}">Filtrar entradas</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let select_filtro_fecha_hora = document.getElementById('select-filtro-fecha-hora')
        let fieldset_fechas_horas = document.getElementById('fieldset-fechas-horas')

        select_filtro_fecha_hora.addEventListener('change', function (e) {
            let disabled_state = this.value === 'cualquier'

            fieldset_fechas_horas.disabled = disabled_state

            if( disabled_state )
                fieldset_fechas_horas.classList.add('d-none')
            else
                fieldset_fechas_horas.classList.remove('d-none')
        })
    </script>
</div>
