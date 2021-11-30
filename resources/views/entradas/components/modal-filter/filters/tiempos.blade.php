<?php

$options_tiempo = (object) [
    'cualquier'   => '- Cualquier tiempo -',
    'actualizado' => 'Actualizado',
    'creado'      => 'Creado',
    'confirmado'  => 'Confirmado',
    'importado'   => 'Importado',
    'reempacado'  => 'Reempacado',
];

$fieldset_fechas_horas = (object) [
    'display' => request('tiempo', 'cualquier') <> 'cualquier' ?: 'd-none',
    'disabled' => request('tiempo', 'cualquier') <> 'cualquier' ?: 'disabled',
];

?>

<div class="mb-3">
    <label for="selectFilterTiempo" class="form-label small">Tiempo</label>
    <select name="tiempo" id="selectFilterTiempo" class="form-control">
        @foreach($options_tiempo as $value => $label)
        <option value="{{ $value }}" <?= toggleSelected($value, request('tiempo')) ?>>{{ $label }}</option>
        @endforeach
    </select>
    <fieldset id="fieldsetFechasHoras" class="mt-3 p-3 bg-light {{ $fieldset_fechas_horas->display }}" {{ $fieldset_fechas_horas->disabled }}>
        <div class="mb-3">
            <label for="inputFilterDesdeFechaHora" class="form-label small">Desde</label>
            <div class="row g-2">
                <div class="col-sm">
                    <input type="date" class="form-control" name="desde_fecha" value="{{ request('desde_fecha', date('Y-01-01')) }}" id="inputFilterDesdeFecha">
                </div>
                <div class="col-sm">
                    <input type="time" class="form-control" name="desde_hora" value="{{ request('desde_hora', '00:00:00') }}" id="inputFilterDesdeHora">
                </div>
            </div>
        </div>

        <div class="">
            <label for="inputFilterHastaFechaHora" class="form-label small">Hasta</label>
            <div class="row g-2">
                <div class="col-sm">
                    <input type="date" class="form-control" name="hasta_fecha" value="{{ request('hasta_fecha', date('Y-m-d')) }}" id="inputFilterHastaFecha">
                </div>
                <div class="col-sm">
                    <input type="time" class="form-control" name="hasta_hora" value="{{ request('hasta_hora', '00:00:00') }}" id="inputFilterHastaHora">
                </div>
            </div>
        </div>
    </fieldset>
</div>

<script>

const DatetimeSelectFilter = {
    element: document.getElementById('selectFilterTiempo'),
    selectedValue: function () {
        return this.element.value
    },
    allOptions: function () {
        return this.element.options
        // *.options[i].value ...
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
    element: document.getElementById('fieldsetFechasHoras'),
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
