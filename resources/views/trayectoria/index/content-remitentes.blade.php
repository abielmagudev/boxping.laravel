<div class="tab-pane fade" id="pills-remitentes" role="tabpanel" aria-labelledby="pills-remitentes-tab">
    <p class="text-end">
        <a href="{{ route('remitentes.create') }}" class="btn btn-sm btn-outline-primary">Nuevo remitente</a>
    </p>

    @component('components.table', [
        'hover' => true,
        'thead' => ['Nombre','Direccion','Postal','Localidad'],
    ])
        @slot('tbody')
            @foreach($remitentes as $remitente)
            <tr>
                <td class="text-nowrap">{{ $remitente->nombre }}</td>
                <td class="text-nowrap">{{ $remitente->direccion }}</td>
                <td class="text-nowrap">{{ $remitente->codigo_postal }}</td>
                <td class="text-nowrap">{{ $remitente->localidad }}</td>
                <td class="text-nowrap text-end">
                    <a href="{{ route('remitentes.show', $remitente) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                </td>
            </tr>
            @endforeach
        @endslot
    @endcomponent
</div>
