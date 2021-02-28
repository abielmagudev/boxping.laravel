<div class="tab-pane fade" id="pills-codigosr" role="tabpanel" aria-labelledby="pills-codigosr-tab">
    <p class="text-end">
        <a href="{{ route('codigosr.create') }}" class="btn btn-sm btn-outline-primary">
            <span>Nuevo código</span>
        </a>
    </p>

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Nombre', 'Descripción', ''])
        @slot('tbody')
        @foreach($codigosr as $codigor)
        <tr>
            <td class="">{{ $codigor->nombre }}</td>
            <td class="" style="min-width:288px">{{ $codigor->descripcion }}</td>
            <td class="text-end text-nowrap">
                <a href="{{ route('codigosr.show', $codigor) }}" class="btn btn-sm btn-primary">
                    @component('components.icon', ['icon' => 'eye'])
                    @endcomponent
                </a>
                <a href="{{ route('codigosr.edit', $codigor) }}" class="btn btn-sm btn-warning">
                    @component('components.icon', ['icon' => 'pencil'])
                    @endcomponent
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
</div>
