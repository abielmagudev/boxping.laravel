<?php

$settings = (object) [
    'except' => isset($except) && is_array($except) && count($except) ? $except : [],
    'has_header' => isset($header) && is_string($header),
    'has_route_results' => isset($route_results) && is_string($route_results),
    'header' => $header ?? null,
    'modal_id' => 'modalFilterEntradas',
    'route_results' => $route_results ?? null,
];

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

@if( $settings->has_route_results )
    
    @component('@.bootstrap.modal-trigger', [
        'classes' => 'btn btn-sm btn-primary',
        'modal' => $settings->modal_id,
        'text' => $svg->filter
    ])    
    @endcomponent

    @component('@.bootstrap.modal', [
        'id' => $settings->modal_id,
        'title' => $settings->header
    ])
        @slot('body')
        <!-- Inicio del formulario para el filtrado -->

        <form action="{{ $settings->route_results }}" method="get" id="form-filtros-entradas">

            @if(! in_array('ambito', $settings->except) )
            <div class="mb-3">
                <label for="select-filtro-ambito" class="form-label d-block small">Ámbito</label>
                <select name="ambito" id="select-filtro-ambito" class="form-control">
                    @foreach ($options->ambitos as $value => $label)
                    <option value="{{ $value }}" {{ selectable(request('ambito'), $value) }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if(! in_array('cliente', $settings->except) )
            <?php $clientes = \App\Cliente::all() ?>
            <div class="mb-3">
                <label for="select-filtro-cliente" class="form-label small">Cliente</label>
                <select name="cliente" id="select-filtro-cliente" class="form-control">
                    <option value="cualquier" selected>- Cualquier cliente -</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ selectable(request('cliente'), $cliente->id) }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if(! in_array('etapa', $settings->except) ) 
            <?php $etapas = \App\Etapa::all() ?>  
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
            @endif

            @if(! in_array('fecha', $settings->except) )   
            <div class="mb-3">
                <label for="select-filtro-fecha-hora" class="form-label small">Fecha y hora</label>
                <select name="fecha_hora" id="select-filtro-fecha-hora" class="form-control">
                    @foreach($options->fechas_horas as $value => $label)
                    <option value="{{ $value }}" {{ selectable(request('fecha_hora'), $value) }}>{{ $label }}</option>
                    @endforeach
                </select>
                <fieldset class="mt-3 p-3 bg-light {{ $fieldset->display }}" id="fieldset-fechas-horas" {{ $fieldset->disabled }}>
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
            @endif

            @if(! in_array('muestreo', $settings->except) )   
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

            @else
            <input class="d-none" type="checkbox" name="muestreo" value="completo" id="radio-filtro-muestreo-completo" checked>

            @endif

        </form>

        <!-- Fin del formulario para el filtrado -->
        @endslot

        @slot('footer')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" form="form-filtros-entradas" name="filter" value="{{ sha1( time() ) }}">Filtrar entradas</button>
        @endslot
    @endcomponent

    <script>

        const DatetimeSelectFilter = {
            element: document.getElementById('select-filtro-fecha-hora'),
            selectedValue: function () {
                return this.element.value
            },
            allOptions: function () {
                // *.options[i].value ...
                return this.element.options
            },
            selectedOption: function () {
                return this.element.selectedIndex
            },
            hasSelectedOption: function (index) {
                return this.selectedOption() === index
            },
            listenChange: function () {
                let self = this

                this.element.addEventListener('change', function (e) {
                    DatetimeFieldsetFilter.switcher( self.hasSelectedOption(0) )
                })
            }
        }

        const DatetimeFieldsetFilter = {
            element: document.getElementById('fieldset-fechas-horas'),
            show: function () {
                this.element.classList.remove('d-none')
                return this
            },
            hide: function () {
                this.element.classList.add('d-none')
                return this
            },
            enable: function () {
                this.element.disabled = false
                return this
            },
            disable: function () {
                this.element.disabled = true
                return this
            },
            turnOn: function () {
                this.enable().show()
            },
            turnOff: function () {
                this.hide().disable()
            },
            switcher: function ( off ) {
                if( off )
                    return this.turnOff()

                this.turnOn()
            }
        }

        DatetimeSelectFilter.listenChange()
    </script>

@endif
