<div class="tab-pane fade" id="pills-vehiculos" role="tabpanel" aria-labelledby="pills-vehiculos-tab">
    <p class="text-end">
        <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-outline-primary">
            <span>Nuevo vehículo</span>
        </a>
    </p>

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Alias', 'Descripción', ''])
        @slot('tbody')
        @foreach($vehiculos as $vehiculo)
        <tr>
            <td class="">{{ $vehiculo->alias }}</td>
            <td class="" style="min-width:288px">{{ $vehiculo->descripcion }}</td>
            <td class="text-end text-nowrap">
                <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-sm btn-primary">
                    @component('components.icon', ['icon' => 'eye'])
                    @endcomponent
                </a>
                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">
                    @component('components.icon', ['icon' => 'pencil'])
                    @endcomponent
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
</div>
